<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasRole('administrateur');
    }

    public function view(User $user, Product $product): bool
    {
        return $user->hasRole('administrateur');
    }

    public function create(User $user): bool
    {
        return $user->hasRole('administrateur');
    }

    public function update(User $user, Product $product): bool
    {
        return $user->hasRole('administrateur');
    }

    public function delete(User $user, Product $product): bool
    {
        return $user->hasRole('administrateur');
    }

    public function restore(User $user, Product $product)
    {
        //
    }

    public function forceDelete(User $user, Product $product)
    {
        //
    }
}
