<x-app-layout>
    <x-slot name="title">
        Ajouter un restaurant
    </x-slot>

    <x-slot name="header">
        Ajouter un restaurant
    </x-slot>

    <x-container class="mt-12">
        <div class="flex justify-center">
            <x-button-link href="{{ route('admin.restaurant.index') }}">
                Revenir à la liste des restaurants
            </x-button-link>
        </div>
    </x-container>

    <x-dashboard-section>
        <x-validation-errors class="mb-4" :errors="$errors"/>

        <x-restaurant-form :restaurant="new \App\Models\Restaurant()" :action="route('admin.restaurant.store')"
                           submit="Ajouter un restaurant"/>
    </x-dashboard-section>
</x-app-layout>
