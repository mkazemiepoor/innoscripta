<?php

namespace App\Services\Api;

use App\Models\Article;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class NewsApiService
{
    public function fetchArticles()
    {
        // Fetch articles from the API
        $response = Http::withOptions([
            'verify' => false, // Disable SSL verification
        ])->get('https://newsapi.org/v2/top-headlines', [
            'apiKey' => env('NEWSAPI_KEY'),
            'country' => 'us',
            'category' => 'technology', // You can modify the category as needed
        ]);

        // Decode the JSON response
        $data = $response->json();

        // Check if 'articles' key exists and is an array
        if (!isset($data['articles']) || !is_array($data['articles'])) {
            return [];  // Return an empty array if no articles are found
        }

        // Get articles data
        $articles = $data['articles'];

        // Store each article in the database
        foreach ($articles as $articleData) {
            Article::updateOrCreate(
                ['title' => $articleData['title']], // Use the title as a unique key for upsert
                [
                    'author' => $articleData['author'] ?? null,
                    'content' => $articleData['content'] ?? null,
                    'source' => $articleData['source']['name'],
                    'category' => 'technology', // Modify if needed
                    'published_at' => Carbon::parse($articleData['publishedAt'])->toDateTimeString(),
                    'url' => $articleData['url'] ?? null,
                    'url_to_image' => $articleData['urlToImage'] ?? null,
                    'description' => $articleData['description'] ?? null,
                ]
            );
        }

        return $articles;  // Return the articles array
    }

}
