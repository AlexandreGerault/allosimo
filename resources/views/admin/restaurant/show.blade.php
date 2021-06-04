<x-app-layout>
    <x-slot name="header">
        Restaurant {{ $restaurant->name }}
    </x-slot>

    <x-dashboard-section>
        <x-slot name="sectionHeading">
            Informations générales
        </x-slot>

        <div class="flex gap-4">
            <img src="{{ Storage::url('restaurants/' . $restaurant->name . '.png') }}" alt="Not loaded" class="block w-24 h-24"/>
            <div class="mt-4">
                <p class="text-gray-900 font-semibold">{{ $restaurant->name }}</p>
                <p class="text-gray-800">{{ $restaurant->description }}</p>
            </div>
        </div>
    </x-dashboard-section>

    <x-dashboard-section>
        <x-slot name="sectionHeading">
            Catégories
        </x-slot>

        <x-button-link href="{{ route('admin.restaurant.category.create', $restaurant) }}">
            Ajouter une catégorie
        </x-button-link>

        <div class="mt-4">
            @forelse($restaurant->productCategories as $category)
            @empty
                <p>Aucune catégorie pour le moment</p>
            @endforelse
        </div>
    </x-dashboard-section>
</x-app-layout>
