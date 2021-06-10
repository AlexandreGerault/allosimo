<header class="header clearfix element_to_stick flex @if(request()->routeIs('*login')
&& ! request()->routeIs('*register')
) sticky_force @endif" x-data="{ open: false }">
    <div class="container flex justify-between items-center">
        <div class="h-10" id="logo">
            <a href="{{ route('tacos-pizza-only.home') }}" class="block">
                <x-application-logo class="block h-10 w-auto fill-current mx-auto" />
            </a>
        </div>
        <!-- /top_menu -->
        <a href="#0" class="open_close" @click="open = true">
            <i class="icon_menu"></i><span>Menu</span>
        </a>
        <nav class="main-menu" :class="{'show': open, '': ! open }">
            <div id="header_menu">
                <a href="#0" class="open_close" @click="open = false">
                    <div class="w-full flex justify-center">
                        <i class="icon_close"></i><span>Menu</span>
                    </div>
                </a>
                <a href="{{ route('tacos-pizza-only.home') }}">
                    <x-application-logo theme="tacos-pizza-only" class="mx-auto" />
                </a>
            </div>
            <ul>
                <li>
                    <a href="{{ route('tacos-pizza-only.home') }}" class="show-submenu">Accueil</a>
                </li>
                @auth
                    @if(auth()->user()->hasRole('administrateur'))
                        <li><a href="{{ route('admin.dashboard') }}">Administration</a></li>
                    @endif
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button>
                                Déconnexion
                            </button>
                        </form>
                    </li>
                @endauth
                @guest
                <li><a href="{{ route('tacos-pizza-only.login') }}">Connexion</a></li>
                <li><a href="{{ route('tacos-pizza-only.register') }}">Inscription</a></li>
                @endguest
            </ul>
        </nav>
    </div>
</header>
<!-- /header -->
