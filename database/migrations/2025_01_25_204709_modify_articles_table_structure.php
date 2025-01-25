<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('url_to_image', 2048)->nullable()->change(); // Allow NULL temporarily
        });
    }
    
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('url_to_image', 255)->nullable()->change(); // Revert to NULL if rollback
        });
    }
};
