<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ekstrakurikulers', function (Blueprint $table) {
            $table->string('pembina_foto')->nullable()->after('pembina');
            $table->text('pembina_deskripsi')->nullable()->after('pembina_foto');
        });
    }

    public function down(): void
    {
        Schema::table('ekstrakurikulers', function (Blueprint $table) {
            $table->dropColumn(['pembina_foto', 'pembina_deskripsi']);
        });
    }
};