<?php

namespace App\Services\Api;

use Illuminate\Support\Facades\Http;

class NewsApiService
{
    public function fetchArticles()
    {
        $response = Http::get('https://newsapi.org/v2/top-headlines', [
            'apiKey' => env('NEWSAPI_KEY'),
            'country' => 'us',
            'category' => 'technology',
        ]);

        return $response->json()['articles'] ?? [];
    }
}
