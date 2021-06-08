<x-guest-layout>
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
                        <a href="{{ route('login') }}" class="btn_1 full-width mb_5">Connexion</a>
                        <div class="divider"><span>Ou</span></div>
                        <a href="{{ route('register') }}" class="btn_1 full-width mb_5">Inscription</a>
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
