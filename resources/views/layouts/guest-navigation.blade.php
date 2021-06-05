<nav x-data="{ open: false }" class="bg-red-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button @click="open = !open" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-red-100 hover:text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <div class="w-6 h-6">
                        <x-heroicon-o-menu ::class="{'hidden': open, 'block': ! open }" class="block" />
                            <x-heroicon-o-x ::class="{'hidden': ! open, 'block': open }" class="hidden" />
                    </div>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <x-application-logo />
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <x-guest-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                            Accueil
                        </x-guest-nav-link>

                        @if(request()->user()?->hasRole('administrateur'))
                            <x-guest-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                                Administration
                            </x-guest-nav-link>
                        @endif

                        <x-guest-nav-link href="{{ route('home') }}" :active="false">
                            Restaurants
                        </x-guest-nav-link>

                        <x-guest-nav-link href="{{ route('home') }}" :active="false">
                            Boulangeries
                        </x-guest-nav-link>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <!-- Profile dropdown -->
                <div class="ml-3 relative">

                    <!--
                      Dropdown menu, show/hide based on menu state.

                      Entering: "transition ease-out duration-100"
                        From: "transform opacity-0 scale-95"
                        To: "transform opacity-100 scale-100"
                      Leaving: "transition ease-in duration-75"
                        From: "transform opacity-100 scale-100"
                        To: "transform opacity-0 scale-95"
                    -->
                    @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <div>
                                <button type="button" class="bg-red-800 flex text-sm rounded-full focus:outline-none" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <span class="flex gap-1 text-white items-center">{{ request()->user()->name }} <x-heroicon-s-chevron-down class="w-4 h-4"/></span>
                                </button>
                            </div>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Vos commandes</x-dropdown-link>
                            <x-dropdown-link href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</x-dropdown-link>
                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                Déconnexion
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div :class="{'block': open, 'hidden': ! open}"  class="hidden sm:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <x-responsive-guest-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                Accueil
            </x-responsive-guest-nav-link>

            @if(request()->user()?->hasRole('administrateur'))
                <x-responsive-guest-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    Administration
                </x-responsive-guest-nav-link>
            @endif

            <x-responsive-guest-nav-link href="{{ route('home') }}" :active="false">
                Restaurants
            </x-responsive-guest-nav-link>

            <x-responsive-guest-nav-link href="{{ route('home') }}" :active="false">
                Boulangeries
            </x-responsive-guest-nav-link>
        </div>
    </div>
</nav>
