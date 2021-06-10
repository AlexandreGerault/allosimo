<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        if (auth()->user()->hasRole('livreur')) {
            return redirect()->route('admin.orders.index');
        }
        if (auth()->user()->hasRole('administrateur')) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        if (Str::startsWith(session()->previousUrl(), route('tacos-charbon.home'))) {
            $link = route('tacos-charbon.home');
        }

        if(Str::startsWith(session()->previousUrl(), route('tacos-pizza-only.home'))) {
            $link = route('tacos-pizza-only.home');
        }

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect($link ?? '/');
    }
}
