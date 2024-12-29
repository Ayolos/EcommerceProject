<?php

namespace App\Http\Controllers;

use App\Contracts\SearchContract;
use App\Contracts\SuggestionContract;
use App\Services\Search\SearchCategoryService;
use App\Services\Search\SearchProductService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SearchController extends Controller
{
    public function __construct(private SearchContract $searchService, private SuggestionContract $suggestionService){}

    public function search(Request $request)
    {
        $search = $request->input('search');

        $results = $this->searchService->search($search);

        return Inertia::render('Search/Index', [
            'products' => $results[SearchProductService::class],
            'categories' => $results[SearchCategoryService::class],
        ]);
    }

    public function suggestion(Request $request)
    {
        $search = $request->input('search');

        if (empty($search)) {
            return response()->json([]);
        }

        $results = $this->suggestionService->suggest($search);

        return response()->json($results);
    }
}
