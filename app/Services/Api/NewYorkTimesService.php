<?php

namespace App\Services\Api;

use App\Helpers\ArticleHelper;
use Illuminate\Support\Facades\Http;

class NewYorkTimesService
{
    public function fetchArticles()
    {
        // Fetch articles from the New York Times API
        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://api.nytimes.com/svc/topstories/v2/technology.json', [
            'api-key' => env('NYTIMES_API_KEY'),
        ]);

        // Decode the JSON response
        $data = $response->json();

        if (!isset($data['results']) || !is_array($data['results'])) {
            return [];
        }

        $articles = $data['results'];

        // Process and save articles using the helper
        foreach ($articles as $articleData) {
            ArticleHelper::saveArticle([
                'title' => $articleData['title'],
                'author' => $articleData['byline'] ?? null,
                'content' => $articleData['abstract'] ?? null,
                'published_at' => $articleData['published_date'],
                'url' => $articleData['url'],
                'url_to_image' => $articleData['multimedia'][0]['url'] ?? null,
                'description' => $articleData['abstract'] ?? null,
                'section' => $articleData['section'],
                'subsection' => $articleData['subsection'] ?? null,
                'uri' => $articleData['id'] ?? null,
                'des_facet' => $articleData['des_facet'] ?? [],
                'multimedia' => $articleData['multimedia'] ?? [],
                'short_url' => $articleData['url'],
            ], 'New York Times');
        }

        return $articles;
    }
}
