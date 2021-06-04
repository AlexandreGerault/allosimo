<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name'     => ['required', 'string', 'unique:products,name'],
            'price'    => ['required', 'numeric', 'min:0'],
            'category' => ['required', 'exists:product_categories,id']
        ];

        if($this->isMethod("PUT")) {
            $rules['name'] = [
                'required',
                'string',
                Rule::unique('products')->ignoreModel($this->route('product'))
            ];
        }

        return $rules;
    }
}
