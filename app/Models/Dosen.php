<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dosen extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pembimbing_1()
    {
        return $this->hasMany(Ujian::class, 'id_pembimbing_1');
    }
    public function pembimbing_2()
    {
        return $this->hasMany(Ujian::class, 'id_pembimbing_2');
    }
    public function penguji()
    {
        return $this->hasMany(Ujian::class, 'id_penguji_1', 'id')
            ->orWhere(function ($query) {
                $query->where('id_penguji_2', $this->id)
                    ->orWhere('id_penguji_3', $this->id);
            });
    }
}
