<?php

namespace App\Policies;

use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductCategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
    }

    public function view(User $user, ProductCategoryPolicy $productCategory)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, ProductCategoryPolicy $productCategory)
    {
    }

    public function delete(User $user, ProductCategoryPolicy $productCategory)
    {
    }

    public function restore(User $user, ProductCategoryPolicy $productCategory)
    {
    }

    public function forceDelete(User $user, ProductCategoryPolicy $productCategory)
    {
    }
}
