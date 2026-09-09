<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('animes', function (Blueprint $table) {
            $table->unsignedBigInteger('mal_id')->nullable()->after('id')->index();
            $table->string('tipe')->nullable()->after('genre');
            $table->integer('episodes')->nullable()->after('tipe');
            $table->string('status')->nullable()->after('episodes');
        });
    }

    public function down(): void
    {
        Schema::table('animes', function (Blueprint $table) {
            $table->dropColumn(['mal_id', 'tipe', 'episodes', 'status']);
        });
    }
};
