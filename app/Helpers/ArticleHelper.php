<?php
namespace App\Helpers;

use App\Models\Article;
use Carbon\Carbon;

class ArticleHelper
{
    public static function saveArticle(array $articleData, string $source)
    {
        $title = $articleData['title'] ?? $articleData['webTitle'] ?? 'Untitled'; // Handle missing title
        $publishedDate = Carbon::parse($articleData['published_at'] ?? $articleData['webPublicationDate'] ?? Carbon::now())->toDateTimeString();

        return Article::updateOrCreate(
            ['title' => $title],
            [
                'author' => $articleData['author'] ?? null,
                'content' => $articleData['content'] ?? null,
                'source' => $source,
                'category' => $articleData['category'] ?? 'general',
                'published_at' => $publishedDate,
                'url' => $articleData['url'] ?? null,
                'url_to_image' => $articleData['url_to_image'] ?? null,
                'description' => $articleData['description'] ?? null,
                'section' => $articleData['section'] ?? null,
                'subsection' => $articleData['subsection'] ?? null,
                'uri' => $articleData['uri'] ?? null,
                'item_type' => 'article',
                'updated_date' => Carbon::now(),
                'created_date' => Carbon::now(),
                'published_date' => $publishedDate,
                'des_facet' => json_encode($articleData['des_facet'] ?? []),
                'org_facet' => $articleData['org_facet'] ?? null,
                'per_facet' => $articleData['per_facet'] ?? null,
                'geo_facet' => $articleData['geo_facet'] ?? null,
                'multimedia' => json_encode($articleData['multimedia'] ?? []),
                'short_url' => $articleData['short_url'] ?? null,
            ]
        );
    }
}
