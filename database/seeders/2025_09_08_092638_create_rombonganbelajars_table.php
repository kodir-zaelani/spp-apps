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
        Schema::create('rombonganbelajar', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('sekolah_id');
            $table->foreignUuid('semester_id');
            $table->foreignUuid('jurusansp_id');
            $table->foreignUuid('tingkatpendidikan_id');
            $table->foreignUuid('kurikulum_id');
            $table->foreignUuid('kebutuhankhusus_id');
            $table->string('nama');
            $table->string('sk_izin')->nullable();
            $table->date('tanggal_sk_izin')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sekolah_id')->references('id')->on('sekolah')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('semester_id')->references('id')->on('semester')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('kebutuhankhusus_id')->references('id')->on('kebutuhankhusus')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('kurikulum_id')->references('id')->on('kurikulum')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('tingkatpendidikan_id')->references('id')->on('tingkatpendidikan')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('jurusansp_id')->references('id')->on('jurusansp')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rombonganbelajar');
    }
};