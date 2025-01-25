<?php

namespace App\Console\Commands;
use App\Models\Article;
use Illuminate\Console\Command;
use App\Services\Api\NewsApiService;
use App\Services\Api\NewYorkTimesService;
use App\Services\Api\GuardianService; // Add Guardian service if you want to include it

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
     * @var GuardianService
     */
    protected $guardianService; // Add Guardian service for additional functionality

    /**
     * Create a new command instance.
     *
     * @param NewsApiService $newsApiService
     * @param NewYorkTimesService $newYorkTimesService
     * @param GuardianService $guardianService
     */
    public function __construct(NewsApiService $newsApiService, NewYorkTimesService $newYorkTimesService, GuardianService $guardianService)
    {
        parent::__construct(); // Ensure the parent constructor is called
        $this->newsApiService = $newsApiService;
        $this->newYorkTimesService = $newYorkTimesService;
        $this->guardianService = $guardianService; // Inject Guardian service
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

        // Optionally, fetch articles from Guardian (if needed)
        $guardianArticles = $this->guardianService->fetchArticles();


        // Fetch articles from New York Times
        $nytArticles = [];//$this->newYorkTimesService->fetchArticles();

        
        // Combine the articles from all APIs
        $articles = array_merge($newsApiArticles, $nytArticles, $guardianArticles);

        // Loop through the articles and save them in the database
        foreach ($articles as $articleData) {
            // Use the appropriate structure to map the article data to the database fields
            Article::updateOrCreate(
                ['title' => $articleData['title']], // Ensure unique identification by title
                [
                    'author' => $articleData['author'] ?? null,
                    'content' => $articleData['content'] ?? null,
                    'source' => $articleData['source'] ?? 'Unknown Source',
                    'category' => $articleData['category'] ?? 'General',
                    'published_at' => isset($articleData['published_at']) ? \Carbon\Carbon::parse($articleData['published_at'])->toDateTimeString() : null,
                    'section' => $articleData['section'] ?? null,
                    'subsection' => $articleData['subsection'] ?? null,
                    'url' => $articleData['url'] ?? null,
                    'uri' => $articleData['uri'] ?? null,
                    'item_type' => $articleData['item_type'] ?? null,
                    'updated_date' => isset($articleData['updated_at']) ? \Carbon\Carbon::parse($articleData['updated_at'])->toDateTimeString() : null,
                    'created_date' => isset($articleData['created_at']) ? \Carbon\Carbon::parse($articleData['created_at'])->toDateTimeString() : null,
                    'published_date' => isset($articleData['published_at']) ? \Carbon\Carbon::parse($articleData['published_at'])->toDateTimeString() : null,
                    'des_facet' => isset($articleData['des_facet']) ? json_encode($articleData['des_facet']) : null,
                    'org_facet' => isset($articleData['org_facet']) ? json_encode($articleData['org_facet']) : null,
                    'per_facet' => isset($articleData['per_facet']) ? json_encode($articleData['per_facet']) : null,
                    'geo_facet' => isset($articleData['geo_facet']) ? json_encode($articleData['geo_facet']) : null,
                    'multimedia' => isset($articleData['multimedia']) ? json_encode($articleData['multimedia']) : null,
                    'short_url' => $articleData['short_url'] ?? null,
                ]
            );
        }

        $this->info(count($articles) . ' articles fetched and stored successfully!');
        return 0;
    }
}
