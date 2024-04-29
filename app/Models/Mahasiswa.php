<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswas';
    protected $fillable = [
        'nama',
        'nim',
        'tahun_masuk',
        'mobile_phone',
        'id_user',
        'mobile_phone',
        'pembimbing_1_id',
        'pembimbing_2_id',
    ];

    protected $guarded = [''];


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function ujian()
    {
        return $this->hasMany(Ujian::class, 'id_mahasiswa', 'id');
    }
    public function pembimbing_1()
    {
        return $this->belongsTo(Dosen::class, 'pembimbing_1_id');
    }
    
    public function pembimbing_2()
    {
        return $this->belongsTo(Dosen::class, 'pembimbing_2_id');
    }
}
