<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryGuyRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DeliveryGuyController extends Controller
{
    /**
     * DeliveryGuyController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(User::class, 'delivery_guy');
    }

    public function index(): View
    {
        $deliveryGuys = User::query()->whereHas('roles', function ($query) {
            $query->where('name', 'livreur');
        })->paginate(5);

        return view('admin.delivery-guys.index', compact('deliveryGuys'));
    }

    public function create(): View
    {
        return view('admin.delivery-guys.create');
    }

    public function store(DeliveryGuyRequest $request): RedirectResponse
    {
        $user = User::create($request->all() + ['password' => Hash::make($request->get('password'))]);
        $user->assignRole('livreur');

        return redirect()->route('admin.delivery-guys.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $deliveryGuy)
    {
        $deliveryGuy->removeRole('livreur');
        $deliveryGuy->save();

        return redirect()->route('admin.delivery-guys.index');
    }
}
