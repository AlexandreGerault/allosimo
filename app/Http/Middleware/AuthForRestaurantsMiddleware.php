<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthForRestaurantsMiddleware
{
    public function handle(Request $request, Closure $next, string $scope)
    {
        if (! Auth::guard('web')->check()) {
            return redirect()->route($scope . '.login');
        }

        return $next($request);
    }
}
