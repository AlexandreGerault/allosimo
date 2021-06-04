<x-app-layout>
    <x-slot name="title">
        Modifier l'option {{ $option->name }}
    </x-slot>

    <x-slot name="header">
        Modifier l'option {{ $option->name }}
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
            Modifier l'option {{ $option->name }}
        </x-slot>

        <x-option-form
            :action="route('admin.restaurant.option-category.option.update', $restaurant, $category, $option)"
            submit="Modifier"/>
    </x-dashboard-section>
</x-app-layout>
