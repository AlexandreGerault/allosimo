@php
if (request()->routeIs('tacos-charbon.*')) {
    $link = route('tacos-charbon.home');
} else if (request()->routeIs('tacos-pizza-only.*')) {
    $link = route('tacos-pizza-only.home');
}

$link = $link ?? route('home');
@endphp

<x-guest-layout>
    <main class="bg_gray pattern">

        <div class="container margin_60_40">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="box_booking_2">
                        <div class="head">
                            <div class="title">
                                <h3>Commande confirmée</h3>
                                @if (request()->routeIs('tacos-pizza-only.*'))
                                    {{ $order->number }}
                                @endif
                            </div>
                        </div>
                        <!-- /head -->
                        <div class="main">
                            <div id="confirm">
                                <div class="icon icon--order-success svg add_bottom_15 flex items-center justify-center mb-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
                                        <g fill="none" stroke="#8EC343" stroke-width="2">
                                            <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                                            <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                                        </g>
                                    </svg>
                                </div>
                                <h3>Votre commande est en cours de traitement...</h3>
                                <p class="text-green-600">{{ $order->price }} DH (hors frais de livraison)</p>
                                <p class="text-sm text-red-400">(Prix estimé)</p>

                                <x-button-link :href="$link" class="my-4">
                                    Commander à nouveau
                                </x-button-link>
                            </div>
                        </div>
                    </div>
                    <!-- /box_booking -->
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->

    </main>
    <!-- /main -->
</x-guest-layout>
