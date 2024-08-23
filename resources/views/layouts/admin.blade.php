<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{-- {{ config('app.name', 'Laravel') }} --}}BoolBnB</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

{{-- Color(?) --}}

<body class="">
    <div id="app">

        <header class="sticky-top">

            <nav class="navbar navbar-expand-lg ms_headernav sticky-top">
                <div class="container-fluid">
                    <a class="navbar-brand d-flex align-items-center" href="{{ route('admin.dashboard') }}">
                        <div class="logo_navbar ms_logo">
                            travel-app
                        </div>
                    </a>
                    <button class="navbar-toggler font border" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar">

                        <ul class="navbar-nav gap-2 ms-auto mb-lg-0">
                            @php
                                use App\Models\Trip;
                            @endphp

                            @if (count(Trip::where('user_id', Auth::id())->get()) >= 1)
                                <li class="nav-item">
                                    <a class="nav-link ms_hover font" href="{{ route('admin.trips.index') }}">I tuoi Viaggi</a>
                                </li>
                            @endif

                            <li class="nav-item">
                                <a class="nav-link ms_hover font" href="{{ route('admin.trips.create') }}">Nuovo Viaggio</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link ms_hover font" href="">Appunti/Note</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link ms_hover font" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>


        </header>
        <div class="container-fluid">
            <div class="row">

                <main class="p-0">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>

</html>
