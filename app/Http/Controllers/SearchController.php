<?php

namespace App\Http\Controllers;

use App\Http\Requests\Search\SearchQueryRequest;
use App\Http\Requests\Search\SuggestionQueryRequest;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\ProductCollection;
use App\Models\Category;
use App\Models\Product;
use App\Services\Search\SearchCategoryService;
use App\Services\Search\SearchProductService;
use App\Services\Suggestion\SuggestionCategoryService;
use App\Services\Suggestion\SuggestionProductService;
use Inertia\Inertia;

class SearchController extends Controller
{
    public function search(SearchQueryRequest $request)
    {
        $search = $request->input('query');

        return Inertia::render('Search/Index', [
            'products' => ProductCollection::make(Product::search($search)),
            'categories' => CategoryCollection::make(Category::search($search)),
        ]);
    }

    public function suggestion(SuggestionQueryRequest $request)
    {
        $query = $request->input('query');

        return response()->json([
            'products' => ProductCollection::make(Product::search($query)->take(5)),
            'categories' => CategoryCollection::make(Category::search($query)->take(5)),
        ]);
    }
}
