<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class AssociateOrderDeliveryGuyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->hasRole('administrateur');
    }

    public function rules(): array
    {
        return [
            'delivery_guy_id' => Rule::exists('model_has_roles', 'model_id')
                                     ->where('model_type', User::class)
                                     ->where('role_id', Role::query()->where('name', '=', 'livreur')->first()->id)
        ];
    }
}
