<?php

namespace App\Observers;

use App\Events\ProductStockEvent;
use App\Models\Cart;

class CartObserver
{
    /**
     * Handle the Cart "created" event.
     */
    public function created(Cart $cart): void
    {
        $cart->product->decrementStock($cart->quantity);
        ProductStockEvent::dispatch($cart->product);
    }

    /**
     * Handle the Cart "updated" event.
     */
    public function updated(Cart $cart): void
    {
        $quantityDifference = abs($cart->quantity - $cart->getOriginal('quantity'));
        if ($cart->getOriginal('quantity') > $cart->quantity) {
            $cart->product->incrementStock($quantityDifference);
        } else {
            $cart->product->decrementStock($quantityDifference);
        }
        ProductStockEvent::dispatch($cart->product);
    }

    /**
     * Handle the Cart "deleted" event.
     */
    public function deleted(Cart $cart): void
    {
        //
        $cart->product->incrementStock($cart->quantity);
        ProductStockEvent::dispatch($cart->product);
    }

    /**
     * Handle the Cart "restored" event.
     */
    public function restored(Cart $cart): void
    {
        //
    }

    /**
     * Handle the Cart "force deleted" event.
     */
    public function forceDeleted(Cart $cart): void
    {
        //
    }
}
