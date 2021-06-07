@props(['restaurant'])

<a href="{{ route('restaurant.show', $restaurant) }}" class="flex flex-col sm:flex-row p-0">
    <div class="w-full sm:w-48">
        <img src="{{ Storage::url('public/restaurants/' . $restaurant->image) }}"  alt="" class="block object-cover w-full h-auto sm:h-full">
    </div>
    <div class="px-6 py-4">
        <div class="score"><strong>{{ $restaurant->stars }}</strong></div>
        <em>{{ $restaurant->town }}</em>
        <h3>{{ $restaurant->name }}</h3>
        <small>
            <x-badge class="{{ $restaurant->state === 'open' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                {{ $restaurant->state === 'open' ? 'Ouvert' : 'Fermé' }}
            </x-badge>
        </small>
    </div>
</a>

{{--
<a href="{{ route('restaurant.show', $restaurant) }}">
    <img src="{{ Storage::url('public/restaurants/' . $restaurant->image) }}"  alt="" class="block slazy object-cover w-full h-auto sm:h-full">
    <div class="score"><strong>{{ $restaurant->stars }}</strong></div>
    <em>{{ $restaurant->town }}</em>
    <h3>{{ $restaurant->name }}</h3>
    <small>8 Patriot Square E2 9NF</small>
</a>
--}}
