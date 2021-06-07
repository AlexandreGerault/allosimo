<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Foogra - Discover & Book the best restaurants at the best price" />
        <meta name="author" content="Ansonika" />
        <title>{{ $title ?? config('app.name')  }}</title>

        <!-- Favicons-->
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png" />
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png" />
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png" />
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png" />

        <!-- GOOGLE WEB FONT -->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

        <!-- BASE CSS -->
        <link href="{{ asset('css/template/bootstrap_customized.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/template.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

        <!-- SPECIFIC CSS -->
        {{ $css ?? '' }}

        <!-- Styles -->

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/common_func.js') }}" defer></script>
        <script src="{{ asset('js/sticky_sidebar.js') }}" defer></script>
    </head>
    <body>
    @include('layouts.guest-navigation')
    {{ $slot }}

    @include('layouts.guest-footer')
    </body>
</html>
