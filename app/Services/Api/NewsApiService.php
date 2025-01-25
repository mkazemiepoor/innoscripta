<?php

namespace App\Services\Api;

use App\Helpers\ArticleHelper;
use Illuminate\Support\Facades\Http;

class NewsApiService
{
    public function fetchArticles()
    {
        // Fetch articles from the News API
        $response = Http::withOptions([
            'verify' => false, // Disable SSL verification for local environments
        ])->get('https://newsapi.org/v2/top-headlines', [
            'apiKey' => env('NEWSAPI_API_KEY'),
            'category' => 'technology',
            'pageSize' => 10,
        ]);
        // Decode the JSON response
        $data = $response->json();

        if (!isset($data['articles']) || !is_array($data['articles'])) {
            return [];
        }

        $articles = $data['articles'];

        // Process and save articles using the helper
        foreach ($articles as $articleData) {
            ArticleHelper::saveArticle([
                'title' => $articleData['title'],
                'author' => $articleData['author'] ?? null,
                'content' => $articleData['content'] ?? null,
                'published_at' => $articleData['publishedAt'],
                'url' => $articleData['url'],
                'url_to_image' => $articleData['urlToImage'] ?? null,
                'description' => $articleData['description'] ?? null,
                'section' => 'technology', // Example; adapt based on actual data
                'subsection' => null,
                'uri' => null, // NewsAPI does not provide a unique URI
                'des_facet' => [], // Not available in NewsAPI
                'multimedia' => [], // Not available in NewsAPI
                'short_url' => $articleData['url'],
            ], 'NewsAPI');
        }

        return $articles;
    }
}
