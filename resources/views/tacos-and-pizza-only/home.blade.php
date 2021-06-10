<x-guest-layout>
    <x-slot name="css">
        <link href="{{ asset('css/template/home.css') }}" rel="stylesheet">
    </x-slot>

    <main>
        <div class="hero_single version_3">
            <div class="opacity-mask bg-black bg-opacity-50" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>Tacos only et Pizza only</h1>
                            <p>Le meilleur French Tacos de Mohammédia</p>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
        </div>
        <!-- /hero_single -->

        <div class="container margin_60_40">
            <div class="row">
                <div class="col-12">
                    <div class="main_title version_2">
                        <span><em></em></span>
                        <h2>Nos restaurants</h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="list_home">
                        <ul class="grid sm:grid-cols-2 gap-4 my-4">
                            @foreach($restaurants as $restaurant)
                                <li>
                                    <x-restaurant-card-home :restaurant="$restaurant"/>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /button visibile on tablet/mobile only -->
        </div>
        <!-- /container -->
    </main>
    <!-- /main -->
</x-guest-layout>
