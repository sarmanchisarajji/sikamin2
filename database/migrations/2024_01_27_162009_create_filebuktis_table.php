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
        Schema::create('filebuktis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_berkas');
            $table->string('file');
            $table->unsignedBigInteger('id_ujian');
            $table->timestamps();
            $table->foreign('id_ujian')->references('id')->on('ujians')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filebuktis');
    }
};
