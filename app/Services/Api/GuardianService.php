<?php

namespace App\Services\Api;

use App\Models\Article;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class GuardianService
{
    public function fetchArticles()
    {
        // Fetch articles from the Guardian API
        $response = Http::withOptions([
            'verify' => false, // Disable SSL verification
        ])->get('https://content.guardianapis.com/search', [
            'api-key' => env('GUARDIAN_API_KEY'),
            'section' => 'technology', // Modify the section as needed
            'page-size' => 10, // Number of articles to fetch
        ]);

        // Decode the JSON response
        $data = $response->json();
        //dd($data);

        // Check if 'response' and 'results' keys exist and are arrays
        if (!isset($data['response']['results']) || !is_array($data['response']['results'])) {
            return [];  // Return an empty array if no articles are found
        }

        // Get articles data
        $articles = $data['response']['results'];

        // Store each article in the database
        foreach ($articles as $articleData) {
            Article::updateOrCreate(
                ['title' => $articleData['title'] ?? 'Untitled'], // Default to 'Untitled' if title is missing
                [
                    'author' => $articleData['author'] ?? null,
                    'content' => $articleData['content'] ?? null,
                    'source' => $articleData['source'] ?? 'Unknown Source',
                    'category' => $articleData['category'] ?? null,
                    'published_at' => $articleData['published_at'] ?? null,
                    'url' => $articleData['url'] ?? null,                    'url_to_image' => $articleData['fields']['thumbnail'] ?? null,
                    'description' => $articleData['fields']['trailText'] ?? null,
                    'section' => $articleData['sectionName'] ?? null,
                    'subsection' => $articleData['subsectionName'] ?? null,
                    'uri' => $articleData['id'] ?? null,
                    'item_type' => 'article', // You can adjust this based on the type of content
                    'updated_date' => Carbon::now(),  // You can adjust this to match the API response
                    'created_date' => Carbon::now(),  // You can adjust this to match the API response
                    'published_date' => Carbon::parse($articleData['webPublicationDate'])->toDateTimeString(),
                    'des_facet' => json_encode($articleData['fields']['facets'] ?? []),  // Assuming this field is an array
                    'org_facet' => null,  // Set these as needed, assuming you have more specific values to populate
                    'per_facet' => null,
                    'geo_facet' => null,
                    'multimedia' => json_encode($articleData['fields']['multimedia'] ?? []),
                    'short_url' => $articleData['webUrl'] ?? null,
                ]
            );
        }

        return $articles;  // Return the articles array
    }
}
