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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author')->nullable();  // Nullable author field
            $table->text('content')->nullable();  // Nullable content field
            $table->string('source');  // Non-nullable source field
            $table->string('category')->nullable();  // Nullable category field
            $table->timestamp('published_at')->nullable();  // Nullable published_at field
            $table->timestamps();  // Automatically adds created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
