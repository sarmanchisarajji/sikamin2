<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ujians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mahasiswa');
            $table->enum('jenis_ujian', ['proposal', 'hasil', 'skripsi']);
            $table->string('judul');
            $table->string('ipk_sementara');
            $table->string('nilai_ujian')->nullable(); 
            $table->string('ketua_sidang')->nullable(); 
            $table->string('sekretaris_sidang')->nullable(); 
            $table->string('anggota_1')->nullable(); 
            $table->string('anggota_2')->nullable(); 
            $table->string('anggota_3')->nullable(); 
            $table->unsignedBigInteger('id_pembimbing_1');
            $table->unsignedBigInteger('id_pembimbing_2');
            $table->unsignedBigInteger('id_penguji_1')->nullable(); 
            $table->unsignedBigInteger('id_penguji_2')->nullable(); 
            $table->unsignedBigInteger('id_penguji_3')->nullable(); 
            $table->string('hari_ujian')->nullable(); 
            $table->string('jam_ujian')->nullable(); 
            $table->string('tempat_ujian')->nullable(); 
            $table->string('ba')->nullable(); // berita acara
            $table->string('st')->nullable(); // surat tugas ujian
            $table->string('sp')->nullable(); // surat penunjukan pembimbing
            $table->string('sk')->nullable(); // surat keterangan ujian
            $table->string('lp')->nullable(); // lembar penilaian
            $table->string('no_sp')->nullable(); 
            $table->string('no_st')->nullable(); 
            $table->string('no_sk')->nullable(); 
            $table->string('nama_ttd')->nullable(); 
            $table->enum('plhplt', ['PLH', 'PLT', ''])->nullable(); 
            $table->timestamps();
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->foreign('id_pembimbing_1')->references('id')->on('dosens')->onDelete('cascade');
            $table->foreign('id_pembimbing_2')->references('id')->on('dosens')->onDelete('cascade');
            $table->foreign('id_penguji_1')->references('id')->on('dosens')->onDelete('cascade');
            $table->foreign('id_penguji_2')->references('id')->on('dosens')->onDelete('cascade');
            $table->foreign('id_penguji_3')->references('id')->on('dosens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ujians');
    }
};

