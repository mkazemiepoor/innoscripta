<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\NewsApiService;

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
     * Create a new command instance.
     *
     * @param NewsApiService $newsApiService
     */
    public function __construct(NewsApiService $newsApiService)
    {
        parent::__construct(); // Ensure the parent constructor is called
        $this->newsApiService = $newsApiService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $articles = $this->newsApiService->fetchArticles();

        // Logic to store articles in the database goes here

        $this->info(count($articles) . ' articles fetched and stored successfully!');
        return 0;
    }
}
