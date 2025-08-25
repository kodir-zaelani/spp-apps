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
        Schema::table('jenisptk', function (Blueprint $table) {
            $table->char('jenis_ptk_id', 4)->unique()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jenisptk', function (Blueprint $table) {
            $table->dropColumn('jenis_ptk_id');
        });
    }
};