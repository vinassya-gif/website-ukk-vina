<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            if (!Schema::hasColumn('galeris', 'jurusan_id')) {
                $table->foreignId('jurusan_id')->nullable()->after('kategori')->constrained('jurusans')->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            $table->dropForeign(['jurusan_id']);
            $table->dropColumn('jurusan_id');
        });
    }
};