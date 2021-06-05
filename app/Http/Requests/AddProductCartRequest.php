<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddProductCartRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'options.*' => [
                Rule::exists('options', 'id')
                    ->whereIn(
                        'option_category_id',
                        $this->product->restaurant->optionCategories()->pluck('id')->toArray()
                    )
            ],
            'quantity'  => ['required', 'numeric', 'min:0']
        ];
    }
}
