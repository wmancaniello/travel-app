@extends('layouts.admin')
@section('content')
    {{-- Welcome --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="text-center">
                    @if (session('status'))
                        <div class="" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1 class="letter-spacing">
                        @php
                            $username = ucfirst(strtolower(Auth::user()->name));
                        @endphp
                        {{ __('Benvenuto') }} {{ $username }} {{ __('!') }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
    {{-- / Welcome --}}

    {{-- CARD --}}
    <div class="container mt-5">
        <div class="row justify-content-center">

            <!-- Card Viaggi -->
            @php
                use App\Models\Trip;
            @endphp
            @if (count(Trip::where('user_id', Auth::id())->get()) >= 1)
            <div class="col-12 col-md-6 col-lg-4 mb-4" style="height: 180px; width: 200px">
                <a href="{{ route('admin.trips.index') }}" class="card text-center h-100 text-decoration-none text-dark">
                    <div
                        class="card-body d-flex flex-column justify-content-center align-items-center ms_color-dashboard hover-effect">
                        <i class="fa-solid fa-plane fa-2x mb-3"></i>
                        <h5 class="card-title">I tuoi Viaggi</h5>
                    </div>
                </a>
            </div>            
            @endif

            <!-- Card Aggiungi Viaggio -->
            <div class="col-12 col-md-6 col-lg-4 mb-4" style="height: 180px; width: 200px">
                <a href="{{ route('admin.trips.create') }}" class="card text-center h-100 text-decoration-none text-dark">
                    <div
                        class="card-body d-flex flex-column justify-content-center align-items-center ms_color-dashboard hover-effect">
                        <i class="fa-solid fa-house-medical fa-2x mb-3"></i>
                        <h5 class="card-title">Aggiungi Viaggio</h5>
                    </div>
                </a>
            </div>

            <!-- Card Note/Appunti -->

            <div class="col-12 col-md-6 col-lg-4 mb-4" style="height: 180px; width: 200px">
                <a href="#" class="card text-center h-100 text-decoration-none text-dark">
                    <div
                        class="card-body d-flex flex-column justify-content-center align-items-center ms_color-dashboard hover-effect">
                        <i class="fa-solid fa-book fa-2x mb-3"></i>
                        <h5 class="card-title">Diario</h5>
                    </div>
                </a>
            </div>

            <!-- Card Logout -->
            <div class="col-12 col-md-6 col-lg-4 mb-4" style="height: 180px; width: 200px">
                <a href="{{ route('logout') }}" class="card text-center h-100 text-decoration-none text-dark"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div
                        class="card-body d-flex flex-column justify-content-center align-items-center ms_color-dashboard hover-effect">
                        <i class="fa-solid fa-arrow-right-from-bracket fa-2x mb-3"></i>
                        <h5 class="card-title">Logout</h5>
                    </div>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
        {{-- /CARD --}}
    </div>
@endsection
