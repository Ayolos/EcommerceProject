<?php

namespace App\Services\Search;

use App\Contracts\SearchContract;
use App\Models\Product;
class SearchProductService implements SearchContract
{
    public function search($search)
    {
        return Product::where('name', 'like', "%$search%")->get();
    }
}
