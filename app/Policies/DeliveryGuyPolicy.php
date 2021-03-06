<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DeliveryGuyPolicy
{
    use HandlesAuthorization;


    public function before(User $user, $ability): ?bool
    {
        return $user->hasRole('administrateur') ? true : null;
    }

    public function viewAny(User $user): bool
    {
        return $user->hasRole('administrateur');
    }

    public function view(User $user, User $model): bool
    {
        return $user->hasRole('administrateur');
    }

    public function create(User $user): bool
    {
        return $user->hasRole('administrateur');
    }

    public function update(User $user, User $model): bool
    {
        return $user->hasRole('administrateur');
    }

    public function delete(User $user, User $model): bool
    {
        return $user->hasRole('administrateur');
    }

    public function restore(User $user, User $model): bool
    {
        return $user->hasRole('administrateur');
    }

    public function forceDelete(User $user, User $model): bool
    {
        return $user->hasRole('administrateur');
    }
}
