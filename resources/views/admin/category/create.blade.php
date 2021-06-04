<x-app-layout>
    <x-slot name="title">
        Ajouter une catégorie
    </x-slot>

    <x-slot name="header">
        Ajouter une catégorie
    </x-slot>

    <x-container class="mt-12">
        <div class="flex justify-center">
            <x-button-link href="{{ route('admin.productCategory.index') }}">
                Revenir à la liste des catégories
            </x-button-link>
        </div>
    </x-container>

    <x-dashboard-section>
        <x-validation-errors class="mb-4" :errors="$errors"/>

        <x-slot name="sectionHeading">
            Ajout d&apos;une catégorie
        </x-slot>

        <x-product-category-form :action="route('admin.productCategory.store')" submit="Ajouter une catégorie"/>
    </x-dashboard-section>
</x-app-layout>
