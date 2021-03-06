@props(['product'])

<x-dropdown width="w-64" :auto-close="false">
    <x-slot name="trigger">
        <x-heroicon-s-plus
            class="w-6 h-6 hover:text-gray-700 transition duration-200 ease-in-out cursor-pointer"/>
    </x-slot>
    <x-slot name="content">
        <form class="px-6 py-4 max-h-72 overflow-y-auto" method="POST" action="{{ route('cart.add', $product) }}">
            @csrf
            @if($product->options()->count() > 0)
                <div>
                    <p class="font-bold mb-2">Options</p>

                    <div class="flex flex-col gap-4">
                        @foreach($product->options->groupBy(fn ($option) => $option->category->name) as $optionCategory => $options)
                            <div>
                                <p class="mb-2">{{ $optionCategory }}</p>

                                <div class="flex flex-col gap-2">
                                    @foreach($options as $option)
                                        <x-label class="flex gap-2 items-center justify-between">
                                            <div class="flex items-center">
                                                <input type="checkbox" value="{{ $option->id }}" name="options[]"/>
                                                <span class="ml-2">{{ $option->name }}</span>
                                            </div>
                                            <span>+ {{ $option->price }} DH</span>
                                        </x-label>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="my-6">
                <x-label>
                    <div class="font-bold mb-2">
                        Quantité
                    </div>
                    <x-input type="number" name="quantity" class="block w-full" value="1"/>
                </x-label>
            </div>

            <div class="my-4">
                <x-button>
                    Ajouter au panier
                </x-button>
            </div>
        </form>
    </x-slot>
</x-dropdown>
