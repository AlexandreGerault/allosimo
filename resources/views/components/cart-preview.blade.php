@inject('cart', 'App\Services\Cart')
@php
    $cart->load();
@endphp

<div class="px-6 py-4 bg-white shadow rounded overflow-hidden">
    <p class="text-2xl font-semibold mb-4">Panier</p>

    <div class="flex flex-col gap-2 my-6">
        @foreach($cart->all() as $line)
            <div class="my-1">
                <div class="flex gap-4 justify-between">
                    <div class="flex gap-2 items-center">
                        <form method="POST" class="h-full flex items-center" action="{{ route('cart.remove') }}">
                            @csrf
                            <input type="hidden" value="{{ array_search($line, $cart->all()) }}" name="line"/>
                            <button class="outline-none focus:outline-none ">
                                <x-heroicon-o-x-circle class="text-red-500 w-6 h-6"/>
                            </button>
                        </form>
                        <span>{{ $line->product()->name }}</span>
                    </div>
                    <span>{{ $line->amount() }} x {{ $line->product()->price }} DH</span>
                </div>
                @if ($line->options()->count() > 0)
                    <ul class="pl-12 w-full">
                        @foreach($line->options() as $option)
                            <li class="flex gap-2 justify-between">
                                <span>{{ $option->name }}</span>
                                <span>{{ $option->price }} DH</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endforeach
    </div>

    <div class="flex flex-col gap-2 my-6">
        <p class="flex justify-between">
            <span>Sous-total :</span>
            <span>{{ $cart->subTotal() }} DH</span>
        </p>
        <p class="flex justify-between">
            <span>Frais de livraison :</span>
            <span>15 DH</span>
        </p>

        <p class="flex justify-end gap-2 text-xl font-bold">
            Total : {{ $cart->subTotal() + 15 }} DH
        </p>
    </div>

    <form action="{{ route('order') }}" method="POST">
        @csrf
        <x-button>
            Commander maintenant
        </x-button>
    </form>
</div>
