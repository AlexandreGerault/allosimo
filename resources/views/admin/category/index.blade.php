<x-app-layout>
    <x-slot name="title">
        Liste des catégories de produit
    </x-slot>

    <x-slot name="header">
        Liste des catégories de produit
    </x-slot>

    <x-container class="mt-12">
        <div class="flex justify-center">
            <x-button-link href="{{ route('admin.product-category.create') }}">Ajouter une catégorie</x-button-link>
        </div>
    </x-container>

    <x-dashboard-section>
        <x-slot name="sectionHeading">
            Catégories
        </x-slot>

        <div class="flex flex-col gap-4 mt-6">
            @forelse($categories as $category)
                <div class="flex gap-4 justify-between">
                    <div>
                        {{ $category->name }}
                    </div>
                    <div class="flex gap-2">
                        <div>
                            {{ $category->products_count }} produits
                        </div>
                        <div>
                            <a href="{{ route('admin.product-category.edit', [$category]) }}"
                               class="text-gray-500 hover:text-red-700 transition duration-200">
                                <x-heroicon-s-pencil class="w-6 h-6"/>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p>Aucune catégorie enregistrée pour le moment.</p>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </x-dashboard-section>
</x-app-layout>
