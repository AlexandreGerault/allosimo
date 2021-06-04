<x-app-layout>
    <x-slot name="title">
        Ajouter une option à {{ $option_category->name }}
    </x-slot>

    <x-slot name="header">
        Ajouter une option à {{ $option_category->name }}
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
            Ajouter une option à {{ $option_category->name }}
        </x-slot>

        <x-option-form :action="route('admin.restaurant.option-category.option.store', [$restaurant, $option_category])"
                       submit="Ajouter l'option"/>
    </x-dashboard-section>
</x-app-layout>
