@props(['restaurant'])

<article class="bg-gray-800 rounded-lg overflow-hidden">
    <div class="px-6 py-4">
        <header class="mb-4">
            <div class="flex items-start justify-between">

                <a href="{{ route('admin.restaurant.show', $restaurant) }}">
                    <p class="text-2xl text-white">{{ $restaurant->name }}</p>
                </a>

                <div class="text-white w-8 h-8">
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
        <div class="flex gap-1">
            @for($i = 0; $i < 5; $i++)
                <x-heroicon-s-star
                    class="w-6 h-6 {{ $i < $restaurant->stars / 2 ? 'text-yellow-500' : 'text-gray-500' }}"/>
            @endfor
        </div>
    </div>

    <footer class="bg-gray-900 px-6 py-4">
        <div class="flex gap-4">
            <a href="{{ route('admin.restaurant.show', $restaurant) }}"
               class="text-gray-200 hover:text-white transition duration-200">
                <x-heroicon-s-eye class="w-6 h-6"/>
            </a>

            <a href="{{ route('admin.restaurant.edit', $restaurant) }}" class="text-white hover:text-gray-200">
                <x-heroicon-s-pencil-alt class="w-6 h-6 text-white"/>
            </a>

            <x-heroicon-s-trash class="w-6 h-6 text-white"/>
        </div>
    </footer>
</article>
