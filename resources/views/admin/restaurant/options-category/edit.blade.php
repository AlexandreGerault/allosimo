<x-app-layout>
    <x-slot name="title">
        Modification de la catégorie {{ $optionCategory->name }}
    </x-slot>

    <x-slot name="header">
        Modification de la catégorie {{ $optionCategory->name }}
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
            Modification de la catégorie {{ $optionCategory->name }}
        </x-slot>

        <x-options-category-form
            :action="route('admin.restaurant.option-category.update', [$restaurant, $optionCategory])" method="PUT"
            :category="$optionCategory" submit="Modifier"/>
    </x-dashboard-section>
</x-app-layout>
