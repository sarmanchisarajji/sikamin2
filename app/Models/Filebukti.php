<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filebukti extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function ujian()
    {
        return $this->belongsTo(Ujian::class, 'id_ujian');
    }
}
