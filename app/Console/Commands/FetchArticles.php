<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\NewsApiService;
use App\Services\Api\NewYorkTimesService; // Import the New York Times service

class FetchArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:articles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch articles from APIs and store them in the database';

    /**
     * @var NewsApiService
     */
    protected $newsApiService;

    /**
     * @var NewYorkTimesService
     */
    protected $newYorkTimesService;

    /**
     * Create a new command instance.
     *
     * @param NewsApiService $newsApiService
     * @param NewYorkTimesService $newYorkTimesService
     */
    public function __construct(NewsApiService $newsApiService, NewYorkTimesService $newYorkTimesService)
    {
        parent::__construct(); // Ensure the parent constructor is called
        $this->newsApiService = $newsApiService;
        $this->newYorkTimesService = $newYorkTimesService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Fetch articles from NewsAPI
        $newsApiArticles = $this->newsApiService->fetchArticles();

        // Fetch articles from New York Times
        $nytArticles = $this->newYorkTimesService->fetchArticles();

        // Combine the articles from both APIs (optional, can be handled as per need)
        $articles = array_merge($newsApiArticles, $nytArticles);

        // Logic to store articles in the database goes here (you can loop through the $articles array)
        // Example of storing articles in the database (you need to implement the actual logic)
        foreach ($articles as $article) {
            // Example: Article::create($article);
        }

        $this->info(count($articles) . ' articles fetched and stored successfully!');
        return 0;
    }
}
