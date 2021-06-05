<?php

namespace App\Http\Requests;

use App\Services\Cart;
use Illuminate\Foundation\Http\FormRequest;

class RemoveCartLineRequest extends FormRequest
{
    public function __construct(protected Cart $cart)
    {
        $this->cart->load();
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'line' => ['required', 'numeric', 'in:' . implode(',', array_keys($this->cart->all()))]
        ];
    }
}
