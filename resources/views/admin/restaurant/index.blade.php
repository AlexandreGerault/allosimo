<x-app-layout>
    <x-slot name="title">
        Liste des restaurants
    </x-slot>

    <x-slot name="header">
        Liste des restaurants
    </x-slot>

    <x-container class="mt-12">
        <div class="flex justify-center">
            <x-button-link href="{{ route('admin.restaurant.create') }}">Ajouter un restaurant</x-button-link>
        </div>
    </x-container>

    <x-dashboard-section>
        <div class="grid sm:grid-cols-2 gap-4">
            @forelse($restaurants as $restaurant)
                <x-restaurant-card :restaurant="$restaurant"/>
            @empty
                <p>Aucun restaurant enregistré pour le moment.</p>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $restaurants->links() }}
        </div>
    </x-dashboard-section>
</x-app-layout>
