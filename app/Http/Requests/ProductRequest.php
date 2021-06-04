<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'unique:products,name'],
            'price'    => ['required', 'numeric', 'min:0'],
            'category' => ['required', 'exists:product_categories,id']
        ];
    }
}
