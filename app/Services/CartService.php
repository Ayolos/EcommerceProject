<?php

namespace App\Services;

use App\Events\ProductStockEvent;
use App\Models\Cart;
use App\Models\Product;

class CartService
{
    protected $cart;
    protected $user;
    protected $product;

    public function __construct(Cart $cart, Product $product)
    {
        $this->cart = $cart;
        $this->user = auth()->user();
        $this->product = $product;
    }

    public function createCart($data)
    {
        dd($this->cart);
        $cartItem = $this->cart->doesProductExist($data['product_id']);

        if (!$this->product->checkStock($data['product_id'], $data['quantity'])) {
            throw new \Exception('Stock insuffisant');
        }

        if ($cartItem) {
            $cartItem->update(['quantity' => $cartItem->quantity + $data['quantity']]);
        } else {
            $this->user->carts()->create($data);
        }

    }

    public function updateCart($data, $cart)
    {
        $quantityDiff = $data['quantity'] - $cart->quantity;

        if (($quantityDiff > 0) && $cart->product->stock < $quantityDiff) {
            throw new \Exception("Stock insuffisant");
        }

        $cart->update($data);
    }
    public function clearCart()
    {
        return $this->user->carts()->delete();
    }

    public function deleteProductFromCart($cart)
    {
        return $cart->delete();
    }
}
