<?php

namespace App\Policies;

use App\Models\Option;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OptionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasRole('administrateur');
    }

    public function view(User $user, Option $option): bool
    {
        return $user->hasRole('administrateur');
    }

    public function create(User $user): bool
    {
        return $user->hasRole('administrateur');
    }

    public function update(User $user, Option $option): bool
    {
        return $user->hasRole('administrateur');
    }

    public function delete(User $user, Option $option): bool
    {
        return $user->hasRole('administrateur');
    }

    public function restore(User $user, Option $option): bool
    {
        return $user->hasRole('administrateur');
    }

    public function forceDelete(User $user, Option $option): bool
    {
        return $user->hasRole('administrateur');
    }
}
