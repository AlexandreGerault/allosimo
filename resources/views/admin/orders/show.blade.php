<x-app-layout>
    <x-slot name="title">
        Commandes
    </x-slot>

    <x-slot name="header">
        Commandes
    </x-slot>

    <x-dashboard-section>
        <x-slot name="sectionHeading">
            Commande de {{ $order->user->name }}
        </x-slot>

        <p>Livrer à {{ $order->user->address }}, {{ $order->user->town }}</p>
        <p>{{ $order->user->phone }}</p>
    </x-dashboard-section>

    <x-dashboard-section>
        <x-slot name="sectionHeading">
            Panier de la commande
        </x-slot>

        <div class="flex flex-col gap-6 mt-6">
            @foreach($order->lines as $line)
                <div class="bg-gray-50 rounded overflow-hidden px-6 py-4">
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

                    <div class="flex justify-end mt-2 font-semibold">
                        Total : {{ $line->price }} DH
                    </div>
                </div>
            @endforeach
            <div class="flex justify-end mx-4 text-xl font-bold mt-6">
                Total : {{ $order->price }} DH
            </div>
        </div>
    </x-dashboard-section>
</x-app-layout>
