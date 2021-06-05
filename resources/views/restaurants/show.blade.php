<x-guest-layout>
    <x-slot name="title">
        Commander chez {{ $restaurant->name }}
    </x-slot>

    <x-container>
        <div class="py-12">
            <div class="flex flex-col-reverse sm:flex-row gap-8">
                <div class="w-full sm:w-2/3 flex flex-col gap-8">
                    <div>
                        <p class="text-3xl px-4 sm:px-0">Restaurant Menu</p>
                    </div>

                    <div class="px-6 py-4 bg-white shadow">
                        @foreach($categories as $category => $products)
                            <p class="font-bold text-xl mb-6">{{ $category }}</p>

                            <div class="flex flex-col gap-4">
                                @foreach($products as $product)
                                    <div class="flex justify-between items-center">
                                        <span>{{ $product->name }}</span>
                                        <div class="flex gap-4">
                                            <span>{{ $product->price }} DH</span>

                                            <x-product-option-card :product="$product" />
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>

                <div>
                    Aperçu du panier
                </div>
            </div>
        </div>
    </x-container>
</x-guest-layout>
