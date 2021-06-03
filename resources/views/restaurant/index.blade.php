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
        @forelse($restaurants as $restaurant)
            <div>
                {{ $restaurant->name }}
            </div>
        @empty
            <p>Aucun restaurant enregistré pour le moment.</p>
        @endforelse
    </x-dashboard-section>
</x-app-layout>
