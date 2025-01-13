<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }

    public function search($query)
    {
        return $this->where('name', 'like', "%$query%")->get();
    }

    public function getActualStock(): int
    {
        return $this->stock - $this->carts()->sum('quantity');
    }

    public function checkStock($quantity): bool
    {
        return $this->getActualStock() >= $quantity;
    }
}
