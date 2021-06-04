<x-app-layout>
    <x-slot name="header">
        Restaurant {{ $restaurant->name }}
    </x-slot>

    <x-container class="mt-12">
        <div class="flex justify-center">
            <x-button-link href="{{ route('admin.restaurant.index') }}">
                Revenir à la liste des restaurants
            </x-button-link>
        </div>
    </x-container>

    <x-dashboard-section>
        <x-slot name="sectionHeading">
            Informations générales
        </x-slot>

        <div class="flex gap-4">
            <img src="{{ Storage::url('restaurants/' . $restaurant->name . '.png') }}" alt="Not loaded"
                 class="block w-24 h-24"/>
            <div class="mt-4">
                <p class="text-gray-900 font-semibold">{{ $restaurant->name }}</p>
                <p class="text-gray-800">{{ $restaurant->description }}</p>
            </div>
        </div>
    </x-dashboard-section>

    <x-dashboard-section>
        <x-slot name="sectionHeading">
            Produits
        </x-slot>

        <x-button-link href="{{ route('admin.restaurant.product.create', $restaurant) }}">
            Ajouter un nouveau produit
        </x-button-link>

        <div class="mt-6 flex flex-col gap-5">
            @forelse($categories as $category => $products)
                <h4 class="text-xl">{{ $category }}</h4>
                @foreach($products as $product)
                    <div class="flex justify-between">
                        <span>{{ $product->name }}</span>
                        <div class="flex gap-4">
                            <span>{{ $product->price }} {{ $product->currency  }}</span>
                            <a href="{{ route('admin.restaurant.product.edit', [$restaurant, $product]) }}"
                               class="text-gray-500 hover:text-red-700 transition duration-200">
                                <x-heroicon-s-pencil class="w-6 h-6"/>
                            </a>
                        </div>
                    </div>
                @endforeach
            @empty
                <p>Aucune catégorie pour le moment</p>
            @endforelse
        </div>
    </x-dashboard-section>

    <x-dashboard-section>
        <x-slot name="sectionHeading">
            Catégories d'options
        </x-slot>

        <x-button-link href="{{ route('admin.restaurant.option-category.create', $restaurant) }}">
            Créer une catégorie d'options pour ce restaurant
        </x-button-link>
    </x-dashboard-section>
</x-app-layout>
