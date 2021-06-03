<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRestaurantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'unique:restaurants,name'],
            'description' => ['required', 'string'],
            'logo'        => ['required', 'image', 'max:1024'],
            'town'        => ['required', 'string'],
            'state'       => ['nullable', 'string', 'in:open,closed'],
            'type'        => ['nullable', 'string', 'in:restaurant,bakery'],
            'stars'       => ['required', 'numeric', 'min:0', 'max:10']
        ];
    }
}
