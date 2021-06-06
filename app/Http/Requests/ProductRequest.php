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
            'name'      => [
                'required',
                'string',
                Rule::unique('products', 'name')->where('restaurant_id', $this->restaurant->id)
            ],
            'price'     => ['required', 'numeric', 'min:0'],
            'category'  => ['required', 'exists:product_categories,id'],
            'image'     => ['sometimes', 'image', 'max:1024'],
            'options.*' => [
                Rule::exists('options', 'id')->whereIn(
                    'option_category_id',
                    $this->restaurant->optionCategories()->pluck(
                        'id'
                    )->toArray()
                )
            ]
        ];

        if ($this->isMethod("PUT")) {
            $rules['name'] = [
                'required',
                'string',
                Rule::unique('products')
                    ->where('restaurant_id', $this->restaurant->id)
                    ->ignoreModel($this->route('product'))
            ];
        }

        return $rules;
    }
}
