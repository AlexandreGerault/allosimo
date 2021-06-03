@props(['restaurant'])

<article class="bg-gray-800 rounded-lg px-6 py-4">
    <header class="mb-4">
        <div class="flex items-center justify-between">
            <p class="text-2xl text-white">{{ $restaurant->name }}</p>

            <div class="text-white">
                @switch ($restaurant->type)
                    @case('bakery')
                    <x-icon-bread/>
                    @break;
                    @case('restaurant')
                    <x-icon-restaurant/>
                    @break;
                @endswitch
            </div>
        </div>

        <x-badge color="{{ $restaurant->state === 'open' ? 'green' : 'red' }}">
            {{ $restaurant->state === 'open' ? 'Ouvert' : 'Fermé' }}
        </x-badge>
    </header>

    <div class="my-2">
        <p class="text-sm text-gray-50">{{ $restaurant->description }}</p>
    </div>

    <footer>
        <div class="flex gap-1">
            @for($i = 0; $i < 5; $i++)
                <x-heroicon-s-star class="w-6 h-6 {{ $i < $restaurant->stars / 2 ? 'text-yellow-500' : 'text-gray-500' }}" />
            @endfor
        </div>
    </footer>
</article>
