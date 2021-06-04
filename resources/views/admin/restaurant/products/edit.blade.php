<x-app-layout>
    <x-slot name="header">
        Modifier {{ $product->name }}
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
            Modifier {{ $product->name }}
        </x-slot>

        <x-validation-errors class="mb-4" :errors="$errors"/>

        <x-product-form :action="route('admin.restaurant.product.update', [$restaurant, $product])" method="PUT" :product="$product"
                        submit="Modifier"/>
    </x-dashboard-section>
</x-app-layout>
