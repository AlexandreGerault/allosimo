<x-guest-layout>
    <x-slot name="title">
        Commander chez {{ $restaurant->name }}
    </x-slot>

    <div class="h-96">
        <div class="relative w-full h-full">
            <div class="absolute w-full h-full">
                <img src="{{ Storage::url('restaurants/' . $restaurant->name . '.png') }}" alt=""
                     class="w-full h-full object-cover"/>
            </div>
            <div class="absolute w-full h-full bg-black opacity-60">
            </div>
            <div class="relative w-full h-full flex items-end">
                <x-container class="w-full py-6">
                    <p class="text-4xl text-white mb-4">{{ $restaurant->name }}</p>
                    <p class="text-2xl text-white">{{ (float) $restaurant->stars / 2.0 }} / 5</p>
                </x-container>
            </div>
        </div>
    </div>

    <x-container>
        <div class="py-12">
            <div class="flex flex-col-reverse sm:flex-row gap-8">
                <div class="w-full sm:w-3/5 flex flex-col gap-8">
                    <div>
                        <p class="text-3xl px-4 sm:px-0">Restaurant Menu</p>
                    </div>

                    @foreach($categories as $category => $products)
                        <div class="px-6 py-4 bg-white shadow">
                            <p class="font-bold text-xl mb-6">{{ $category }}</p>

                            <div class="flex flex-col gap-4">
                                @foreach($products as $product)
                                    <div class="flex justify-between items-center">
                                        <span>{{ $product->name }}</span>
                                        <div class="flex gap-4">
                                            <span>{{ $product->price }} DH</span>

                                            <x-product-option-card :product="$product"/>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="flex-grow">
                    <x-cart-preview/>
                </div>
            </div>
        </div>
    </x-container>
</x-guest-layout>
