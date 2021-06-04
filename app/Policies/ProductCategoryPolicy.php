<?php

namespace App\Policies;

use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductCategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasRole('administrateur');
    }

    public function view(User $user, ProductCategoryPolicy $productCategory): bool
    {
        return $user->hasRole('administrateur');
    }

    public function create(User $user): bool
    {
        return $user->hasRole('administrateur');
    }

    public function update(User $user, ProductCategoryPolicy $productCategory): bool
    {
        return $user->hasRole('administrateur');
    }

    public function delete(User $user, ProductCategoryPolicy $productCategory): bool
    {
        return $user->hasRole('administrateur');
    }

    public function restore(User $user, ProductCategoryPolicy $productCategory): bool
    {
        return $user->hasRole('administrateur');
    }

    public function forceDelete(User $user, ProductCategoryPolicy $productCategory): bool
    {
        return $user->hasRole('administrateur');
    }
}
