<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Http\Resources\CartCollection;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Services\CartService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CartController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->getCart();

        return Inertia::render('Cart/Index', [
            'cart' => CartResource::make($cart),
        ]);
    }

    public function store(CartRequest $request)
    {
        $cart = auth()->user()->getCart();

        $products = collect($request->validated()['products'])
            ->mapWithKeys(function ($item) {
                return [$item['id'] => ['quantity' => $item['quantity']]];
            })
            ->toArray();

        $cart->products()->attach($products);

        return redirect()->back();
    }

    public function update(CartRequest $request, Cart $cart)
    {
        $products = collect($request->validated()['products'])
            ->mapWithKeys(function ($item) {
                return [$item['id'] => ['quantity' => $item['quantity']]];
            })
            ->toArray();

        $cart->products()->sync($products);

        return redirect()->back();
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return redirect()->back();
    }
}
