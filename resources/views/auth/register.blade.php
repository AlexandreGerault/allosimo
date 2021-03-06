@php
    if (request()->routeIs('tacos-pizza-only.*')) {
        $loginLink = route('tacos-pizza-only.login');
        $registerLink = route('tacos-pizza-only.register');
    } elseif (request()->routeIs('tacos-charbon.*')) {
        $loginLink = route('tacos-charbon.login');
        $registerLink = route('tacos-charbon.register');
    }

    $loginLink = $loginLink ?? route('login');
    $registerLink = $registerLink ?? route('register');
@endphp

<x-guest-layout>
    <x-slot name="title">
        Connexion sur AlloSimo
    </x-slot>

    <x-slot name="css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </x-slot>

    <div class="container margin_60_40 mt-16">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="sign_up">
                    <div class="head">
                        <div class="title">
                            <h3>Connexion</h3>
                        </div>
                    </div>
                    <!-- /head -->
                    <div class="main">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input id="name" class="form-control" type="text" name="name" :value="old('name')" required placeholder="Nom Prénom"
                                autofocus />
                                <i class="icon_pencil"></i>
                            </div>
                            <div class="form-group">
                                <input id="email" class="form-control" type="email" name="email" :value="old('email')" placeholder="Adresse mail" required/>
                                <i class="icon_mail"></i>
                            </div>
                            <div class="form-group">
                                <input id="phone" class="form-control" type="tel" name="phone" :value="old('phone')" placeholder="Numéro de téléphone" required/>
                                <i class="icon_phone"></i>
                            </div>
                            <div class="form-group">
                                <input id="town" class="form-control" type="text" name="town" :value="old('town')" placeholder="Ville" required/>
                                <i class="icon_map"></i>
                            </div>
                            <div class="form-group">
                                <input id="address" class="form-control" type="text" name="address" :value="old('address')" placeholder="Adresse" required/>
                                <i class="icon_building"></i>
                            </div>
                            <div class="form-group">
                                <input id="password" class="form-control"
                                       type="password"
                                       name="password"
                                       placeholder="Mot de passe"
                                       required autocomplete="new-password"/>
                                <i class="icon_lock"></i>
                            </div>
                            <div class="form-group add_bottom_15">
                                <input id="password_confirmation" class="form-control"
                                       type="password"
                                       placeholder="Confirmer le mot de passe"
                                       name="password_confirmation" required />
                                <i class="icon_lock"></i>
                            </div>
                            <button class="btn_1 full-width mb_5">S'inscrire</button>
                        </form>
                        <div class="divider"><span>Ou</span></div>
                        <a href="{{ $loginLink }}" class="btn_1 full-width mb_5">Se connecter</a>
                    </div>
                </div>
                <!-- /box_booking -->
            </div>
            <!-- /col -->

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</x-guest-layout>
