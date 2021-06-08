<x-app-layout>
    <x-slot name="title">
        Tableau de bord
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-dashboard-section>
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Statistiques des 30 derniers jours
            </h3>
            <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
                <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                    <dt class="text-sm font-medium text-gray-500 truncate">
                        Chiffre d'affaire
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">
                        {{ $turnover }} DH
                    </dd>
                </div>

                <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                    <dt class="text-sm font-medium text-gray-500 truncate">
                        Livraisons effectuées
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">
                        {{ $delivered }}
                    </dd>
                </div>

                <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                    <dt class="text-sm font-medium text-gray-500 truncate">
                        Avg. Click Rate
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">
                        24.57%
                    </dd>
                </div>
            </dl>
        </div>
    </x-dashboard-section>
</x-app-layout>
