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
            $table->string('nilai_ujian');
            $table->string('ketua_sidang');
            $table->string('sekretaris_sidang');
            $table->string('anggota_1');
            $table->string('anggota_2');
            $table->string('anggota_3');
            $table->unsignedBigInteger('id_pembimbing_1');
            $table->unsignedBigInteger('id_pembimbing_2');
            $table->unsignedBigInteger('id_penguji_1');
            $table->unsignedBigInteger('id_penguji_2');
            $table->unsignedBigInteger('id_penguji_3');
            $table->string('hari_ujian');
            $table->string('jam_ujian');
            $table->string('tempat_ujian');
            $table->string('ba'); //Berita acara
            $table->string('st'); //surat tugas ujian
            $table->string('sp'); //surat penunjukan pembimbing
            $table->string('sk'); //surat keterangan ujian
            $table->string('lp'); //lembar penilaian
            $table->string('no_sp');
            $table->string('no_st');
            $table->string('no_sk');
            $table->string('nama_ttd');
            $table->enum('plhplt', ['PLH', 'PLT', '']);
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
