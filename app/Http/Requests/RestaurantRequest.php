<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RestaurantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name'        => ['required', 'string', 'unique:restaurants,name'],
            'description' => ['required', 'string'],
            'town'        => ['required', 'string'],
            'state'       => ['nullable', 'string', 'in:open,closed'],
            'type'        => ['nullable', 'string', 'in:restaurant,bakery'],
            'stars'       => ['required', 'numeric', 'min:0', 'max:10']
        ];

        if ($this->isMethod('POST')) {
            $rules['logo'] = ['required', 'image', 'max:1024'];
        }

        if ($this->method() === "PUT") {
            $rules['name'] = [
                'required',
                'string',
                Rule::unique('restaurants')->ignoreModel($this->route('restaurant'))
            ];
            if ($this->get('logo')) {
                $rules['logo'] = ['sometimes', 'image', 'max:1024'];
            }
        }

        return $rules;
    }
}
