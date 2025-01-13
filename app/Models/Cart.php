<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function getCart(){
        return auth()->user()->carts()->with('product')->get();
    }

    public function findCart($productId){
        return auth()->user()->carts()->with('product')->where('product_id', $productId)->first();
    }

    public function incrementCart($quantity){
        return $this->increment('quantity', $quantity);
    }
}
