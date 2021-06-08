<x-guest-layout>
    <x-slot name="title">
        Connexion sur AlloSimo
    </x-slot>

    <x-slot name="css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </x-slot>

    <div class="container margin_60_40">
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
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input id="email" class="form-control" type="email" name="email" :value="old('email')" placeholder="Adresse mail" required autofocus />
                                <i class="icon_mail"></i>
                            </div>
                            <div class="form-group add_bottom_15">
                                <input id="password" class="form-control"
                                       placeholder="Mot de passe"
                                       type="password"
                                       name="password"
                                       required autocomplete="current-password" />
                                <i class="icon_lock"></i>
                            </div>
                            <button class="btn_1 full-width mb_5">Se connecter</button>
                        </form>
                        <div class="divider"><span>Ou</span></div>
                        <a href="{{ route('register') }}" class="btn_1 full-width mb_5">S'inscrire</a>
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
