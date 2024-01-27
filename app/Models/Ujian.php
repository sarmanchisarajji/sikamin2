<?php

namespace App\Models;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ujian extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }
    public function pembimbing_1()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_pembimbing_1');
    }
    public function pembimbing_2()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_pembimbing_2');
    }
    public function penguji_1()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_penguji_1');
    }
    public function penguji_2()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_penguji_2');
    }
    public function penguji_3()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_penguji_3');
    }
    public function filebukti()
    {
        return $this->hasMany(Filebukti::class, 'id_ujian');
    }
}
