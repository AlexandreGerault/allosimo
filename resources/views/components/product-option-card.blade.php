@props(['product'])

<x-dropdown :width="72" :auto-close="false">
    <x-slot name="trigger">
        <x-heroicon-s-plus-circle class="w-6 h-6 hover:text-gray-700 transition duration-200 ease-in-out cursor-pointer"/>
    </x-slot>
    <x-slot name="content">
        <form class="px-6 py-4">
            @if($product->options()->count() > 0)
            <div>
                <p class="font-bold mb-2">Options</p>

                @foreach($product->options->groupBy(fn ($option) => $option->category->name) as $optionCategory => $options)
                    <p class="mb-2">{{ $optionCategory }}</p>

                    <div class="flex flex-col gap-2">
                        @foreach($options as $option)
                            <x-label class="flex gap-1 items-center">
                                <input type="checkbox"/>
                                {{ $option->name }}
                            </x-label>
                        @endforeach
                    </div>
                @endforeach
            </div>
            @endif

            <div class="my-6">
                <x-label>
                    <div class="text-base font-bold mb-2">
                        Quantité
                    </div>
                    <x-input type="number" name="quantity"
                             class="block w-full"/>
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
