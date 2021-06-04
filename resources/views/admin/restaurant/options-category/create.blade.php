<x-app-layout>
    <x-slot name="title">
        Ajouter une catégorie d'options
    </x-slot>

    <x-slot name="header">
        Ajouter une catégorie d'options
    </x-slot>

    <x-container class="mt-12">
        <div class="flex justify-center">
            <x-button-link href="{{ route('admin.restaurant.show', $restaurant) }}">
                Revenir à la fiche du restaurant
            </x-button-link>
        </div>
    </x-container>

    <x-dashboard-section>
        <x-validation-errors class="mb-4" :errors="$errors"/>

        <x-slot name="sectionHeading">
            Création d'une catégorie d'options
        </x-slot>

        <x-options-category-form :action="route('admin.restaurant.option-category.store', $restaurant)" submit="Ajouter la catégorie"/>
    </x-dashboard-section>
</x-app-layout>
