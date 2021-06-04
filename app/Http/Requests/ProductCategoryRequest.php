<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'unique:product_categories,name']
        ];

        if ($this->isMethod("PUT")) {
            $rules['name'] = [
                'required',
                'string',
                Rule::unique('product_categories')->ignoreModel($this->route('product_category'))
            ];
        }

        return $rules;
    }
}
