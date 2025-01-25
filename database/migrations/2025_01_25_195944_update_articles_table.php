<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // Drop unnecessary columns
            $table->dropColumn(['uri', 'item_type', 'updated_date', 'created_date', 'published_date']);

            // Optionally, remove JSON fields if not used
            $table->dropColumn(['des_facet', 'org_facet', 'per_facet', 'geo_facet', 'multimedia']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // Reverse the column drops (add them back if needed)
            $table->string('uri')->nullable();
            $table->string('item_type')->nullable();
            $table->timestamp('updated_date')->nullable();
            $table->timestamp('created_date')->nullable();
            $table->timestamp('published_date')->nullable();

            // Add back JSON fields if needed
            $table->longText('des_facet')->nullable();
            $table->longText('org_facet')->nullable();
            $table->longText('per_facet')->nullable();
            $table->longText('geo_facet')->nullable();
            $table->longText('multimedia')->nullable();
        });
    }
};
