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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim')->unique();
            $table->string('tahun_masuk');
            $table->string('mobile_phone')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('pembimbing_1_id')->nullable();
            $table->unsignedBigInteger('pembimbing_2_id')->nullable();

            $table->foreign('pembimbing_1_id')->references('id')->on('dosens')->onDelete('set null');
            $table->foreign('pembimbing_2_id')->references('id')->on('dosens')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
