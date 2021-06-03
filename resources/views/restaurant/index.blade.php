<x-app-layout>
    <x-slot name="title">
        Liste des restaurants
    </x-slot>

    <x-slot name="header">
        Liste des restaurants
    </x-slot>

    <x-container class="mt-6">
        <x-button-link href="{{ route('restaurant.create') }}">Ajouter un restaurant</x-button-link>
    </x-container>
    <x-dashboard-section>
        <div class="grid grid-cols-2 gap-4">
        @forelse($restaurants as $restaurant)
                <x-restaurant-card :restaurant="$restaurant"/>
        @empty
            <p>Aucun restaurant enregistré pour le moment.</p>
        @endforelse
        </div>
    </x-dashboard-section>
</x-app-layout>
