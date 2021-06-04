<x-app-layout>
    <x-slot name="header">
        Ajouter un produit au restaurant {{ $restaurant->name }}
    </x-slot>

    <x-container class="mt-12">
        <div class="flex justify-center">
            <x-button-link href="{{ route('admin.restaurant.show', $restaurant) }}">
                Revenir à la fiche du restaurant
            </x-button-link>
        </div>
    </x-container>

    <x-dashboard-section>
        <x-slot name="sectionHeading">
            Ajouter un produit à {{ $restaurant->name }}
        </x-slot>

        <x-product-form :action="route('admin.restaurant.product.store', $restaurant)"
                        submit="Ajouter le nouveau produit"/>
    </x-dashboard-section>
</x-app-layout>
