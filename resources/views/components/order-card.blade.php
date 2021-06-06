@props(['order'])

<article class="bg-gray-800 rounded-lg overflow-hidden">
    <div class="px-6 py-4">
        <header class="mb-4">
            <div class="flex items-start justify-between">
                <a href="{{ route('admin.orders.show', $order) }}">
                    <p class="text-2xl text-white">{{ $order->user->name }}</p>
                </a>

                <div class="text-white w-8 h-8">
                    {{ $order->price + 15 }} DH
                </div>
            </div>

            <x-badge color="{{ $order->state === 'confirmed' ? 'green' : 'red' }}">
                {{ $order->state === 'confirmed' ? 'Confirmée' : 'Annulée' }}
            </x-badge>
        </header>

        <div class="my-2">
            <p class="text-sm text-gray-50">{{ $order->user->address }}, {{ $order->user->town }}</p>
        </div>
    </div>
    </footer>
</article>
