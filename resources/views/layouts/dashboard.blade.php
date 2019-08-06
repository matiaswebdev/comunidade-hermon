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
            <div class="profile-picture" style="background-image: url({{asset('images/person.png')}}); background-position: center; background-repeat: no-repeat; background-size: cover;"></div>
            <p class="username">{{ $data['username'] }}</p>
            <p class="cargo">{{ $data['cargo']}}</p>
            <hr>

            <div class="menu-links">
                <ul>
                    <li class="selected"><a href="/internos/index">Internos</a>
                        <ul>
                            <li><a href="/internos/index">Procurar</a></li>
                            <li><a href="/internos/create">Novo</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Usuários</a></li>
                    <li><a href="#">Restrições</a></li>
                    <li><a href="#">Relatório</a></li>
                    <li><a href="#">Suporte</a></li>
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
