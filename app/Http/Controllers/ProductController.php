<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    //

    public function index()
    {
        $products = Product::latest()->get();

        return Inertia::render('Product/Index', [
            'products' => $products,
        ]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return Inertia::render('Product/Show', [
            'product' => $product,
        ]);

    }
}
