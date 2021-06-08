<header class="header clearfix element_to_stick bg-black bg-opacity-70" x-data="{ open: false }">
    <div class="container">
        <div class="h-10" id="logo">
            <a href="{{ route('home') }}" class="block">
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
                    <i class="icon_close"></i><span>Menu</span>
                </a>
                <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" width="140" height="35" alt=""></a>
            </div>
            <ul>
                <li>
                    <a href="{{ route('home') }}" class="show-submenu">Accueil</a>
                </li>
                @auth
                    @if(auth()->user()->hasRole('administrateur'))
                        <li><a href="{{ route('dashboard') }}">Administration</a></li>
                    @endif
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a href="{{ route('logout') }}" class="text-white hover:text-gray-200 focus:text-gray-200"
                               onclick="event.preventDefault(); this.closest('form').submit();">
                                Déconnexion
                            </a>
                        </form>
                    </li>
                @endauth
                @guest
                <li><a href="{{ route('login') }}">Connexion</a></li>
                <li><a href="{{ route('register') }}">Inscription</a></li>
                @endguest
            </ul>
        </nav>
    </div>
</header>
<!-- /header -->
