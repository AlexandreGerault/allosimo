<x-app-layout>
    <x-slot name="title">
        Modifier {{ $productCategory->name }}
    </x-slot>

    <x-slot name="header">
        Modifier {{ $productCategory->name }}
    </x-slot>

    <x-container class="mt-12">
        <div class="flex justify-center">
            <x-button-link href="{{ route('admin.product-category.index') }}">
                Revenir à la liste des catégories
            </x-button-link>
        </div>
    </x-container>

    <x-dashboard-section>
        <x-validation-errors class="mb-4" :errors="$errors"/>

        <x-slot name="sectionHeading">
            Modification de {{ $productCategory->name }}
        </x-slot>

        <x-product-category-form :action="route('admin.product-category.update', $productCategory)" :category="$productCategory" method="PUT" submit="Modifier"/>
    </x-dashboard-section>
</x-app-layout>
