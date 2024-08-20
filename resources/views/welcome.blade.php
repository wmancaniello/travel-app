@extends('layouts.app')
@section('content')
    <section class="login-container">
        <div class="container-login" id="container">
            <div class="form-container sign-up">

                {{-- REGISTER --}}
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h1>Crea Account</h1>
                    <div class="social-icons">
                        <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                    <span>oppure, usa la tua mail per la registrazione</span>

                    {{-- Nome --}}
                    <label for="name"></label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                        placeholder="Nome">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    {{-- /Nome --}}

                    {{-- Email --}}
                    <label for="email"></label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    {{-- Email --}}

                    {{-- Password --}}
                    <label for="password"></label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    {{-- Conferma --}}
                    <label for="password-confirm"></label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                        autocomplete="new-password" placeholder="Conferma Password">
                    {{-- Password --}}

                    {{-- btn REGISTER --}}
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                    {{-- /btn REGISTER --}}
                </form>
                {{-- /REGISTER --}}
            </div>

            <div class="form-container sign-in">

                {{-- LOGIN --}}
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <h1>Accedi</h1>
                    <div class="social-icons">
                        <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                    <span>oppure usa la tua mail o password</span>

                    {{-- E-mail --}}
                    <label for="email"></label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="Email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    {{-- /E-mail --}}

                    {{-- Password --}}
                    <label for="password"></label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    {{-- /Password --}}

                    {{-- REMEMBER PSW --}}
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Password dimenticata?') }}
                        </a>
                    @endif
                    {{-- /REMEMBER PSW --}}

                    {{-- btn LOGIN --}}
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                    {{-- /btn LOGIN --}}

                </form>
                {{-- /LOGIN --}}

            </div>

            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-panel toggle-left">
                        <h1>Sei già iscritto?</h1>
                        <p>Clicca qui ed entra con le tue credenziali, per aver accesso al tuo profilo!</p>
                        <button class="hidden" id="login">ACCEDI</button>
                    </div>
                    <div class="toggle-panel toggle-right">
                        <h1>Benvenuto!</h1>
                        <p>Non sei registrato? Clicca qui per registarti!</p>
                        <button class="hidden" id="register">REGISTRATI</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
