@props(['restaurant'])

<article>
    <div class="flex flex-col sm:flex-row gap-4 w-full bg-white rounded-lg shadow overflow-hidden">
        <div class="w-full sm:w-72">
            <img src="{{ Storage::url('restaurants/' . $restaurant->name . '.png') }}" class="w-full h-full object-cover"/>
        </div>
        <div class="px-6 py-4 w-full">
            <header class="flex flex-col gap-4 mb-4">
                <div class="flex items-start justify-between">
                    <div class="flex flex-col gap-1">
                        <div class="flex flex-col md:flex-row md:items-center gap-2">
                            <a href="{{ route('admin.restaurant.show', $restaurant) }}">
                                <p class="text-lg">{{ $restaurant->name }}</p>
                            </a>

                            <div>
                                <x-badge color="{{ $restaurant->state === 'open' ? 'green' : 'red' }}">
                                    {{ $restaurant->state === 'open' ? 'Ouvert' : 'Fermé' }}
                                </x-badge>
                            </div>
                        </div>
                    </div>

                    <div class="text-gray-900 w-8 h-8">
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

                <div class="flex gap-1">
                    @for($i = 0; $i < 5; $i++)
                        <x-heroicon-s-star
                            class="w-6 h-6 {{ $i < $restaurant->stars / 2 ? 'text-yellow-500' : 'text-gray-500' }}"/>
                    @endfor
                </div>
            </header>

            {{--<p>{{ $restaurant->description }}</p>--}}
        </div>
    </div>
</article>
