<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>


<body>
    <!-- Left Menu -->
    <div class="left">
        <section class="menu">
            <div class="profile-picture"></div>
            <p>{{ $data['username'] }}</p>
            <p class="cargo">{{ $data['cargo']}}</p>
            <hr>

            <div class="menu-links">
                <ul>
                    <li class="selected"><a href="#">Internos</a>
                        <ul>
                            <li><a href="#">Procurar</a></li>
                            <li><a href="#">Novo</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Internos</a></li>
                    <li><a href="#">Internos</a></li>
                    <li><a href="#">Internos</a></li>
                </ul>
            </div>
        </section>
    </div>
    <div class="right">
        <section class="top-menu">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="">
                @csrf
                <button type="submit" name="submit">Logout</button>
            </form>
        </section>
        <section class="main-content">
            @yield('content')
        </section>
    </div>
</body>
</html>
