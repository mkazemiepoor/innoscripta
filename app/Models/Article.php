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
    ];

    // You can define any relationships or additional methods here if needed
}
