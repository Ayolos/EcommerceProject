<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class CartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                foreach ($this->products as $productObject) {
                    $product = Product::find($productObject['id']);

                    if (!$product->checkStock($productObject['id'], $productObject['quantity'])) {
                        $validator->errors()->add(
                            'field',
                            'Stock insuffisant'
                        );
                    }
                }
            }
        ];
    }
}
