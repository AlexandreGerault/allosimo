<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasRole('administrateur');
    }

    public function view(User $user, Order $order): bool
    {
        return $user->hasRole('administrateur');
    }

    public function create(User $user): bool
    {
        return $user->hasRole('administrateur');
    }

    public function update(User $user, Order $order): bool
    {
        return $user->hasRole('administrateur');
    }

    public function delete(User $user, Order $order): bool
    {
        return $user->hasRole('administrateur');
    }

    public function restore(User $user, Order $order): bool
    {
        return $user->hasRole('administrateur');
    }

    public function forceDelete(User $user, Order $order): bool
    {
        return $user->hasRole('administrateur');
    }
}
