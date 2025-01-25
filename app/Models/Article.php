<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional, if table name is not plural of model name)
    protected $table = 'articles';

    // Define the attributes that can be mass-assigned
    protected $fillable = [
        'title',
        'author',
        'content',
        'source',
        'category',
        'published_at',
        'url',
        'url_to_image',
        'description',
        'section',
        'subsection',
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
    ];

    // Define attributes that should be cast to specific types (e.g., JSON fields to arrays)
    protected $casts = [
        'des_facet' => 'array',
        'org_facet' => 'array',
        'per_facet' => 'array',
        'geo_facet' => 'array',
        'multimedia' => 'array',
    ];

    // Optionally, you can add other methods or relationships if necessary
}
