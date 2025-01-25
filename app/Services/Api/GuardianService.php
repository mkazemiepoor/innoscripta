<?php

namespace App\Services\Api;

use App\Helpers\ArticleHelper;
use Illuminate\Support\Facades\Http;

class GuardianService
{
    public function fetchArticles()
    {
        // Fetch articles from the Guardian API
        $response = Http::withOptions([
            'verify' => false, // Disable SSL verification
        ])->get('https://content.guardianapis.com/search', [
            'api-key' => env('GUARDIAN_API_KEY'),
            'section' => 'technology',
            'page-size' => 10,
        ]);

        // Decode the JSON response
        $data = $response->json();

        if (!isset($data['response']['results']) || !is_array($data['response']['results'])) {
            return [];
        }

        $articles = $data['response']['results'];

        // Process and save articles using the helper
        foreach ($articles as $articleData) {
            ArticleHelper::saveArticle([
                'title' => $articleData['webTitle'],
                'author' => $articleData['author'] ?? null,
                'content' => $articleData['fields']['body'] ?? null,
                'published_at' => $articleData['webPublicationDate'],
                'url' => $articleData['webUrl'],
                'url_to_image' => $articleData['fields']['thumbnail'] ?? null,
                'description' => $articleData['fields']['trailText'] ?? null,
                'section' => $articleData['sectionName'],
                'subsection' => $articleData['subsectionName'] ?? null, // Safely access subsectionName
                'uri' => $articleData['id'],
                'des_facet' => $articleData['fields']['facets'] ?? [],
                'multimedia' => $articleData['fields']['multimedia'] ?? [],
                'short_url' => $articleData['webUrl'],
            ], 'The Guardian');
        }

        return $articles;
    }
}
