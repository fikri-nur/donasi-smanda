<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title : 'Donasi SMANDA' }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=roboto:300,500,900" rel="stylesheet">

    {{-- Icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('build/assets/app-5aed3ed4.css') }}">
    @stack('css')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('assets/img/logo/473-SMAN_1_PANDAAN_PASURUAN.png') }}" alt=""
                        style="max-width: 40px; font-weight: 900; font-size: 18px;">
                    Donasi SMANDA
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent"
                    style="font-size: 16px; font-weight: 700;">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="">Data User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Data Campaign</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Data Donatur</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{ asset('assets/img/avatar/user.png') }}" alt="Profile Image"
                                        class="avatar-img">
                                    {{ Auth::user()->name }}
                                </a>


                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user"></i> {{ __('Profil') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        <i class="fas fa-home"></i> {{ __('Home') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="height: 70vh">
            {{-- Alert --}}
            @include('partials.alert')

            {{-- Content --}}
            @yield('content')
        </main>

        <footer class="bg-dark text-light py-4">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-3">
                        <h5>Profil Singkat</h5>
                        <p>SMA Negeri 1 Pandaan, merupakan SMA tertua di Kabupaten Pasuruan.
                            Berdiri pada tahun 1974, kini SMAN 1 Pandaan telah berumur 45 tahun</p>
                    </div>
                    <div class="col-md-3">
                        <h5>Alamat</h5>
                        <p>Jl. Dr. Sutomo, Sukun, Sumber Gedang, Kec. Pandaan, Pasuruan, Jawa Timur 67156</p>
                    </div>
                    <div class="col-md-3">
                        <h5>Kontak</h5>
                        <p><i class="fas fa-envelope"></i> Email: <a
                                href="mailto:support.smanda@gmail.com">support.smanda@gmail.com</a></p>
                        <p><i class="fas fa-phone"></i> Telepon: +62 343 631593</p>
                    </div>
                    <div class="col-md-3">
                        <h5>Sosial Media</h5>
                        <p><a href="#" class="text-light"><i class="fab fa-facebook"></i> Facebook</a></p>
                        <p><a href="#" class="text-light"><i class="fab fa-twitter"></i> Twitter</a></p>
                        <p><a href="#" class="text-light"><i class="fab fa-instagram"></i> Instagram</a></p>
                    </div>
                </div>
            </div>
        </footer>

    </div>


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @stack('js')
</body>

</html>
