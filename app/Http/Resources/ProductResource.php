<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    //public static $wrap = 'product';

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'quantity' => $this->whenPivotLoaded('cart_product', function () {
                return $this->pivot->quantity;
            }),
            'stock' => $this->stock,
            'stock_initial' => $this->stock_initial,
            'stock_actual' => $this->getActualStock(),
            'image' => $this->image,
            'status' => $this->status,
            'category' => CategoryResource::make($this->category),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
