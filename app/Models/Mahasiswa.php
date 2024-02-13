<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'nim', 'tahun_masuk', 'id_user'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function ujian()
    {
        return $this->hasMany(Ujian::class, 'id_mahasiswa', 'id');
    }
}
