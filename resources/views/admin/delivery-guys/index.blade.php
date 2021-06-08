<x-app-layout>
    <x-slot name="title">
        Liste des livreurs
    </x-slot>

    <x-slot name="header">
        Liste des livreurs
    </x-slot>

    <x-dashboard-section>
        <x-slot name="sectionHeading">
            Livreurs
        </x-slot>

        <x-button-link :href="route('admin.delivery-guys.create')">
            Créer un compte livreur
        </x-button-link>

        <div class="my-6 flex flex-col gap-4">
            @foreach($deliveryGuys as $guy)
                <div class="px-6 py-4 bg-gray-50 rounded-lg flex items-center justify-between">
                    <p>{{ $guy->name }}</p>
                    <form action="{{ route('admin.delivery-guys.destroy', $guy) }}" method="POST" class="flex items-center">
                        @csrf
                        @method("DELETE")
                        <button>
                            <x-heroicon-s-trash class="w-6 h-6 text-gray-800 hover:text-red-800 transition duration-200" />
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="my-6">
            {{ $deliveryGuys->links() }}
        </div>
    </x-dashboard-section>
</x-app-layout>
