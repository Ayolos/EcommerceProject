<?php

namespace App\Services\Search;

use App\Models\Category;
use App\Contracts\SearchContract;

class SearchCategoryService implements SearchContract
{

    public function search($search)
    {
        return Category::where('name', 'like', "%$search%")->get();
    }
}
