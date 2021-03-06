@props(['order', 'deliveryGuys' => []])

<article class="bg-gray-800 rounded-lg overflow-hidden">
    <div class="px-6 py-4">
        <header class="mb-4">
            <div class="flex items-start justify-between">
                <a href="{{ route('admin.orders.show', $order) }}">
                    <p class="text-2xl text-white">{{ $order->user->name }}</p>
                </a>

                <p class="text-white">
                    {{ $order->number ?? "Pas de numéro de commande" }}
                </p>
            </div>

            <x-badge
                class="{{ $order->state === 'confirmed' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                {{ $order->state === 'confirmed' ? 'Confirmée' : 'Annulée' }}
            </x-badge>
        </header>

        <div class="my-2">
            <p class="font-semibold text-lg text-gray-50">Informations client</p>
            <p class="text-sm text-gray-50">{{ $order->user->address }}, {{ $order->user->town }}</p>
            <p class="text-sm text-gray-50">{{ $order->user->phone }}</p>

            <p class="text-sm text-white">
                {{ $order->created_at->diffForHumans() }} <span class="text-xs">({{ $order->created_at->setTimezone('Africa/Casablanca')->locale('fr')->translatedFormat('j F Y \à g:i') }})</span>
            </p>

            @if(auth()->user()->hasRole('administrateur'))
                <div class="my-4">
                    <p class="font-semibold text-lg text-gray-50">Livreur</p>
                    @if($order?->deliveryGuy)
                        @if($order->seen_at)
                            <p class="text-white font-semibold">
                                Vu par le livreur à {{ $order->seen_at->setTimezone('Africa/Casablanca')->locale('fr')->translatedFormat('j F Y \à g:i') }}
                            </p>
                        @else
                            <p class="text-white font-semibold">
                                Commande pas encore vue par le livreur
                            </p>
                        @endif
                        <p class="text-sm text-gray-50">{{ $order->deliveryGuy->name }}</p>
                        <p class="text-sm text-gray-50">{{ $order->deliveryGuy->phone }}</p>
                    @else
                        <p class="text-sm text-gray-50">Aucun livreur sélectionné</p>
                        @if(auth()->user()->hasRole('administrateur'))
                            <form action="{{ route('admin.orders.delivery-guys.store', $order) }}" method="POST"
                                  class="flex flex-col gap-2 my-4">
                                @csrf
                                <x-select name="delivery_guy_id">
                                    @foreach($deliveryGuys as $guy)
                                        <option value="{{ $guy->id }}"
                                                @if($order?->deliveryGuy?->id === $guy->id) selected @endif>{{ $guy->name }}</option>
                                    @endforeach
                                </x-select>
                                <div>
                                    <x-button class="bg-green-600 hover:bg-green-800">
                                        Assigner ce livreur
                                    </x-button>
                                </div>
                            </form>
                        @endif
                    @endif
                </div>
            @endif


            <hr class="my-4"/>

            <div class="flex flex-col gap-6 mt-6">
                @foreach($restaurants = $order->lines->groupedByRestaurant() as $restaurantName => $lines)
                    <p class="text-white">Commandé chez : {{ $restaurantName }}</p>
                    @foreach($lines as $index => $line)
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
                    @if ($restaurants->keys()->last() !== $restaurantName)
                        <hr class="my-6"/>
                    @endif
                @endforeach
                <div class="flex justify-end mx-4 text-xl font-bold mt-6 text-white">
                    Total : {{ $order->price + 15 }} DH
                </div>
                @can('delete', $order)
                    <form
                        action="{{ route('admin.orders.destroy', $order) }}"
                        method="POST"
                        class="text-gray-800 hover:text-red-800 transition duration-200">
                        @method("DELETE")
                        @csrf
                        <x-button>
                            Supprimer cette commande
                        </x-button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
</article>
