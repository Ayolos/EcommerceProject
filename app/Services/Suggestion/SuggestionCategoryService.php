<?php

namespace App\Services\Suggestion;

use App\Contracts\SuggestionContract;
use App\Models\Category;

class SuggestionCategoryService implements SuggestionContract
{

    public function suggest($search)
    {
        return Category::where('name', 'like', "%$search%")->get();
    }
}
