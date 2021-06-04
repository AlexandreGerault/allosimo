<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OptionCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        if ($this->isMethod("PUT")) {
            return [
                'name' => [
                    'required',
                    'string',
                    Rule::unique('option_categories')
                        ->where('restaurant_id', $this->route('restaurant')->id)
                        ->ignoreModel($this->route('option_category'))
                ]
            ];
        }

        return [
            'name' => [
                'required',
                'string',
                Rule::unique('option_categories')
                    ->where('restaurant_id', $this->route('restaurant')->id)
            ]
        ];
    }
}
