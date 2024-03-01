<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'username', 'password', 'nama_pengguna', 'email', 'no_hp', 'user_type', 'is_aktif',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $getUser = self::orderBy('id', 'desc')->first();

            if ($getUser) {
                $latestID = intval(substr($getUser->user_id, 3));
                $nextID = $latestID + 1;
            } else {
                $nextID = 1;
            }
            $model->user_id = '000' . sprintf("%03s", $nextID);
            while (self::where('user_id', $model->user_id)->exists()) {
                $nextID++;
                $model->user_id = '000' . sprintf("%03s", $nextID);
            }
        });

        static::created(function ($user) {
            if ($user->user_type === 'mahasiswa') {
                Mahasiswa::create([
                    'id_user' => $user->id,
                ]);
            } elseif ($user->user_type === 'dosen') {
                Dosen::create([
                    'id_user' => $user->id,
                ]);
            }
        });
    }

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'id_user');
    }

    public function dosen()
    {
        return $this->hasOne(Dosen::class, 'id_user');
    }
}
