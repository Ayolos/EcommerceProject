<?php

namespace App\Services\Suggestion;

use App\Contracts\SuggestionContract;
use App\Models\Product;
class SuggestionProductService implements SuggestionContract
{
    public function suggest($search)
    {
        return Product::where('name', 'like', "%$search%")->get();
    }
}
