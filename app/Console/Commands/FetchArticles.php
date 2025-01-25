<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\GuardianService;
use App\Services\Api\NewsApiService;
use App\Services\Api\NewYorkTimesService;

class FetchArticles extends Command
{
    protected $signature = 'fetch:articles';
    protected $description = 'Fetch articles from different APIs';

    protected $guardianService;
    protected $newsApiService;
    protected $newYorkTimesService;

    public function __construct(GuardianService $guardianService, NewsApiService $newsApiService, NewYorkTimesService $newYorkTimesService)
    {
        parent::__construct();
        $this->guardianService = $guardianService;
        $this->newsApiService = $newsApiService;
        $this->newYorkTimesService = $newYorkTimesService;
    }

    public function handle()
    {
        $this->info('Fetching Guardian articles...');
        $this->guardianService->fetchArticles();

        $this->info('Fetching NewsAPI articles...');
        $this->newsApiService->fetchArticles();

        $this->info('Fetching New York Times articles...');
        $this->newYorkTimesService->fetchArticles();

        $this->info('All articles fetched!');
    }
}
