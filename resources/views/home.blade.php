<x-guest-layout>
    <div>

        <section class="py-12">
            <x-container>
                <div class="mb-6 pb-5 px-4 sm:px-0 border-b border-gray-200 sm:flex sm:items-center sm:justify-between">
                    <h3 class="text-2xl leading-6 font-medium text-gray-900">
                        Restaurants Mohammédia
                    </h3>
                    <div class="mt-3 sm:mt-0 sm:ml-4">
                        <a href="#" class="text-sm font-bold text-red-800">
                            Voir tous
                        </a>
                    </div>
                </div>

                <div class="grid lg:grid-cols-2 gap-4 px-4 sm:px-0">
                    @forelse($restaurants as $restaurant)
                        <x-restaurant-card-home :restaurant="$restaurant"/>
                    @empty
                        <p>Il n'y a pour le moment aucun restaurant pour Mohammédia</p>
                    @endforelse
                </div>
            </x-container>
        </section>

        <section class="py-12">
            <x-container>
                <div class="mb-6 pb-5 border-b border-gray-200 sm:flex sm:items-center sm:justify-between">
                    <h3 class="text-2xl leading-6 font-medium text-gray-900">
                        Boulangeries et pâtisseries Mohammédia
                    </h3>
                    <div class="mt-3 sm:mt-0 sm:ml-4">
                        <a href="#" class="text-sm font-bold text-red-800">
                            Voir tous
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    @forelse($bakeries as $restaurant)
                        <x-restaurant-card-home :restaurant="$restaurant"/>
                    @empty
                        <p>Il n'y a pour le moment aucune boulangerie pour Mohammédia</p>
                    @endforelse
                </div>
            </x-container>
        </section>

        <div class="py-12 bg-red-700 text-white">
            <x-container>
                <p class="uppercase font-semibold">Android App</p>
                <p class="text-3xl font-bold mt-4">Téléchargez notre application mobile "Allo Simo"</p>
                <p class="text-2xl">Disponible pour <strong>Android</strong></p>
                <x-button-link href="#" color="green" class="text-white mt-4">
                    Télécharger
                </x-button-link>
            </x-container>
        </div>
    </div>
</x-guest-layout>
