<?php

namespace App\Http\Controllers;

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
            'category' => $category,
            'products' => $category->products()->get(),
        ]);
    }
}
