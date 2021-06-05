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
                    <span>{{ $line->product()->name }}</span>
                    <span>{{ $line->amount() }} x {{ $line->product()->price }} DH</span>
                </div>
                @if ($line->options()->count() > 0)
                    <ul class="pl-8 w-full">
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
            <span>10 DH</span>
        </p>
    </div>

    <x-button-link>
        Commander maintenant
    </x-button-link>
</div>
