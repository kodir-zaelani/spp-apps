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
        Schema::create('jenistagihan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('sekolah_id');
            $table->foreignUuid('tahunajaran_id');
            $table->string('nama');
            $table->enum('kategori', ['down_payment', 'full_payment'])->nullable();
            $table->unsignedInteger('besaran');
            $table->date('tanggal_mulai');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('sekolah_id')->references('id')->on('sekolah')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('tahunajaran_id')->references('id')->on('tahunajaran')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenistagihan');
    }
};