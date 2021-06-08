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

            <x-badge class="{{ $order->state === 'confirmed' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                {{ $order->state === 'confirmed' ? 'Confirmée' : 'Annulée' }}
            </x-badge>
        </header>

        <div class="my-2">
            <p class="text-sm text-gray-50">{{ $order->user->address }}, {{ $order->user->town }}</p>

            <div class="flex flex-col gap-6 mt-6">
                @foreach($order->lines as $line)
                    <div class="bg-gray-50 rounded overflow-hidden px-6 py-4">
                        <div class="flex gap-4">
                            <div>
                                {{ $line->quantity }}
                            </div>
                            <div class="flex-grow">
                                <div class="flex gap-4 justify-between">
                                    <div>
                                        {{ $line->product->name }}
                                    </div>
                                    <div>
                                        {{ $line->product->price }} DH
                                    </div>
                                </div>
                                <div class="pl-6">
                                    @foreach($line->options as $option)
                                        <div class="flex justify-between">
                                            <div>{{ $option->name }}</div>
                                            <div>{{ $option->price }} DH</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end mt-2 font-semibold">
                            Total : {{ $line->price }} DH
                        </div>
                    </div>
                @endforeach
                <div class="flex justify-end mx-4 text-xl font-bold mt-6 text-white">
                    Total : {{ $order->price }} DH
                </div>
            </div>
        </div>
    </div>
    </footer>
</article>
