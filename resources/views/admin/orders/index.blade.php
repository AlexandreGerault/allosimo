<x-app-layout>
    <x-slot name="title">
        Commandes
    </x-slot>

    <x-slot name="header">
        Commandes
    </x-slot>

    <x-dashboard-section>
        <div class="grid sm:grid-cols-2 gap-4">
            @forelse($orders as $order)
                <x-order-card :order="$order" />
            @empty
                <p>Aucune livraison en cours pour le moment.</p>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    </x-dashboard-section>
</x-app-layout>
