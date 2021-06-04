<?php

namespace App\Policies;

use App\Models\OptionCategory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OptionCategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasRole('administrateur');
    }

    public function view(User $user, OptionCategory $optionCategory): bool
    {
        return $user->hasRole('administrateur');
    }

    public function create(User $user): bool
    {
        return $user->hasRole('administrateur');
    }

    public function update(User $user, OptionCategory $optionCategory): bool
    {
        return $user->hasRole('administrateur');
    }

    public function delete(User $user, OptionCategory $optionCategory): bool
    {
        return $user->hasRole('administrateur');
    }

    public function restore(User $user, OptionCategory $optionCategory): bool
    {
        return $user->hasRole('administrateur');
    }

    public function forceDelete(User $user, OptionCategory $optionCategory): bool
    {
        return $user->hasRole('administrateur');
    }
}
