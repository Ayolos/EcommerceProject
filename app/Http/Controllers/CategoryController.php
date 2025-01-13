<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    //
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return Inertia::render('Category/Show', [
            'category' => CategoryResource::make($category),
            'products' => ProductCollection::make($category->products()->get()),
        ]);
    }
}
