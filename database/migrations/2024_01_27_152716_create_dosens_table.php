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
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dosen');
            $table->string('nip')->nullable();
            $table->string('nidn')->unique();
            $table->enum('jabatan_akademik', ['dosen', 'sekjur', 'kajur']);
            $table->date('tmt_akademik')->nullable();
            $table->enum('status', ['aktif', 'tidak aktif', 'tugas belajar']);
            $table->string('pangkat')->nullable();
            $table->date('tmt_pangkat')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
