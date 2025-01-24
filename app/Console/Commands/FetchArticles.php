<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\NewsApiService;
use App\Models\Article;

class FetchArticles extends Command
{
    protected $signature = 'fetch:articles';
    protected $description = 'Fetch articles from external APIs';

    public function __construct(NewsApiService $newsApiService)
    {
        $this->newsApiService = $newsApiService;
    }
    
    public function handle(NewsApiService $newsApiService)
    {
        $articles = $newsApiService->fetchArticles();

        foreach ($articles as $article) {
            Article::updateOrCreate(
                ['url' => $article['url']], // Avoid duplicates
                [
                    'title' => $article['title'],
                    'description' => $article['description'],
                    'content' => $article['content'] ?? '',
                    'source' => 'NewsAPI',
                    'author' => $article['author'] ?? 'Unknown',
                    'published_at' => $article['publishedAt'] ?? now(),
                ]
            );
        }

        $this->info('Articles fetched and stored successfully.');
    }
}
