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
        Schema::table('articles', function (Blueprint $table) {
            // Add columns to store the New York Times response structure
            $table->string('section')->nullable();
            $table->string('subsection')->nullable();
            $table->string('url')->nullable();  // URL of the article
            $table->string('uri')->nullable();  // Unique identifier of the article
            $table->string('item_type')->nullable();  // Type of the item, like "Article"
            $table->timestamp('updated_date')->nullable();  // Timestamp of the last update
            $table->timestamp('created_date')->nullable();  // Timestamp of article creation
            $table->timestamp('published_date')->nullable();  // Timestamp of the article's publication date
            $table->json('des_facet')->nullable();  // JSON field for description facets
            $table->json('org_facet')->nullable();  // JSON field for organization facets
            $table->json('per_facet')->nullable();  // JSON field for person facets
            $table->json('geo_facet')->nullable();  // JSON field for geo facets
            $table->json('multimedia')->nullable();  // JSON field for multimedia data
            $table->string('short_url')->nullable();  // Short URL if available
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // Drop the columns added for the second service
            $table->dropColumn([
                'section',
                'subsection',
                'url',
                'uri',
                'item_type',
                'updated_date',
                'created_date',
                'published_date',
                'des_facet',
                'org_facet',
                'per_facet',
                'geo_facet',
                'multimedia',
                'short_url',
            ]);
        });
    }
};
