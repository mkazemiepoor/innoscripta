<?php

namespace App\Services\Api;

use App\Models\Article;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class NewYorkTimesService
{
    public function fetchArticles($section = 'arts')
    {
        // Fetch articles from the New York Times API
        $response = Http::withOptions([
            'verify' => false, // Disable SSL verification
        ])->get("https://api.nytimes.com/svc/topstories/v2/{$section}.json", [
            'api-key' => env('NYT_API_KEY'),
        ]);

        // Decode the JSON response
        $data = $response->json();

        // Check if 'results' key exists and is an array
        if (!isset($data['results']) || !is_array($data['results'])) {
            return [];  // Return an empty array if no articles are found
        }

        // Get articles data
        $articles = $data['results'];

        // Store each article in the database
        foreach ($articles as $articleData) {
            Article::updateOrCreate(
                ['title' => $articleData['title']], // Use the title as a unique key for upsert
                [
                    'author' => $articleData['byline'] ?? null, // 'byline' is used for the author in NYT
                    'content' => $articleData['abstract'] ?? null, // You can use 'abstract' as content
                    'source' => 'New York Times', // Hardcoded source as it's always from NYT
                    'category' => $articleData['section'] ?? 'General', // Use section as category
                    'published_at' => Carbon::parse($articleData['published_date'])->toDateTimeString(),
                    'url' => $articleData['url'] ?? null, // URL of the article
                    'url_to_image' => $articleData['multimedia'][0]['url'] ?? null, // First multimedia image
                    'description' => $articleData['abstract'] ?? null, // You can map 'abstract' to description
                    'section' => $articleData['section'] ?? null, // Section of the article
                    'subsection' => $articleData['subsection'] ?? null, // Subsection of the article
                    'uri' => $articleData['uri'] ?? null, // URI if available
                    'item_type' => 'article', // Static type as article
                    'updated_date' => Carbon::now()->toDateTimeString(),
                    'created_date' => Carbon::now()->toDateTimeString(),
                    'published_date' => Carbon::parse($articleData['published_date'])->toDateTimeString(),
                    'des_facet' => json_encode($articleData['des_facet'] ?? []), // JSON encode facets
                    'org_facet' => json_encode($articleData['org_facet'] ?? []),
                    'per_facet' => json_encode($articleData['per_facet'] ?? []),
                    'geo_facet' => json_encode($articleData['geo_facet'] ?? []),
                    'multimedia' => json_encode($articleData['multimedia'] ?? []), // Store multimedia info
                    'short_url' => $articleData['short_url'] ?? null, // Short URL
                ]
            );
        }

        return $articles;  // Return the articles array
    }
}
