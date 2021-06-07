<header class="header clearfix element_to_stick">
    <div class="container">
        <div class="h-10" id="logo">
            <a href="{{ route('dashboard') }}" class="block">
                <x-application-logo class="block h-10 w-auto fill-current" />
            </a>
        </div>
        <!-- /top_menu -->
        <a href="#0" class="open_close">
            <i class="icon_menu"></i><span>Menu</span>
        </a>
        <nav class="main-menu">
            <div id="header_menu">
                <a href="#0" class="open_close">
                    <i class="icon_close"></i><span>Menu</span>
                </a>
                <a href="index.html"><img src="{{ asset('img/logo.png') }}" width="140" height="35" alt=""></a>
            </div>
            <ul>
                <li class="submenu">
                    <a href="{{ route('home') }}" class="show-submenu">Accueil</a>
                </li>
                @auth
                    <li class="submenu">
                        <a href="#0" class="show-submenu">{{ request()->user()->name }}</a>
                        <ul>
                            @if(auth()->user()->hasRole('administrateur'))
                                <li><a href="{{ route('dashboard') }}">Administration</a></li>
                            @endif
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); this.closest('form').submit();">
                                        Déconnexion
                                    </a>
                                </form>
                            </li>
                        </ul>
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
