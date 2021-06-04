<x-app-layout>
    <x-slot name="title">
        Modifier le restaurant {{ $restaurant->name }}
    </x-slot>

    <x-slot name="header">
        Modifier le restaurant {{ $restaurant->name }}
    </x-slot>

    <x-dashboard-section>
        <x-validation-errors class="mb-4" :errors="$errors"/>

        <x-restaurant-form :restaurant="$restaurant" :action="route('admin.restaurant.update', compact('restaurant'))"
                           method="PUT"
                           submit="Modifier"/>
    </x-dashboard-section>
</x-app-layout>
