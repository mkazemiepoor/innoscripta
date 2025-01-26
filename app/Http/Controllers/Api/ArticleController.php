<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        // Default pagination parameters
        $page = $request->get('page', 1); // Default to page 1
        $perPage = $request->get('per_page', 10); // Default to 10 articles per page

        // Build the query
        $query = Article::query();

        // Apply filters if present in the request
        if ($request->has('category')) {
            $query->where('category', $request->input('category'));
        }

        if ($request->has('author')) {
            $query->where('author', $request->input('author'));
        }

        if ($request->has('source')) {
            $query->where('source', $request->input('source'));
        }

        if ($request->has('date_from') && $request->has('date_to')) {
            $query->whereBetween('published_at', [
                $request->input('date_from'),
                $request->input('date_to'),
            ]);
        } elseif ($request->has('date_from')) {
            $query->where('published_at', '>=', $request->input('date_from'));
        } elseif ($request->has('date_to')) {
            $query->where('published_at', '<=', $request->input('date_to'));
        }

        // Add pagination
        $articles = $query->paginate($perPage, ['*'], 'page', $page);

        // Return the paginated response
        return response()->json($articles);
    }
}
