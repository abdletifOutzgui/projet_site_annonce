<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield("title", config("app.name"))</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
    @yield("styles")

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
           <div class="container">
                <div class="float-left">
                    <a href="/"><img src="/storage/logo/logo.png" class="logo" title="Mon Stage"></a>
                </div>
                <div class="navs">
                    <a class="navbar-brand menu" href="{{ route("offres.all") }}">Offres de stage</a>
                    <a class="navbar-brand menu" href="{{ route("all.demandes") }}">demandes de Stage</a>
                    <a class="navbar-brand menu" href="/">blog & astuces</a>
                </div>
                <div class="d-flex">
                    @guest
                        <a class="btn btn-outline-secondary stagiaire" href="/espace/stagiaire/create">Espace Stagiaire</a>&nbsp;
                        <a class="btn btn-outline-primary recruteur" href="/register">Espace Recruteur</a>
                    @else
                        <div class="dropdown">
                            <div class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              {{ Auth::user()->full_name }}
                            </div>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/home">
                                    <i class="fas fa-tachometer-alt"></i> &nbsp; Dashboard
                                </a>
                                <a class="dropdown-item" href="/profile">
                                    <i class="fas fa-user-circle"></i> &nbsp; Mon Profile
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> &nbsp; Se déconnecter
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        @include('includes._footer')
    </div>

    @yield('scripts')


    <script src="{{ asset("js/app.js") }}"></script>
    <!-- AOS JS -->

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
