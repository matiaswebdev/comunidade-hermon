<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{asset('js/ajax.js')}}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    @yeld('assets')
</head>


<body>
    <!-- Left Menu -->
    <div class="left">
        <section class="menu">
            <div class="profile-picture" style="background-image: url({{asset('images/person.png')}}); background-position: center; background-repeat: no-repeat; background-size: cover;"></div>
            <p class="username">{{ $data['username'] }}</p>
            <p class="cargo">{{ $data['cargo']}}</p>
            <hr>

            <div class="menu-links" id="jq-menulinks">
                <ul>
                    <li id="internos"><a href="#">Internos</a>
                        <ul>
                            <li><a href="/internos/index">Procurar</a></li>
                            <li><a href="/internos/create">Novo</a></li>
                        </ul>
                    </li>
                    <li id="usuarios"><a href="#">Usuários</a>
                        <ul>
                            <li><a href="#">teste</a></li>
                        </ul>
                    </li>
                    <li id="restricoes"><a href="#">Restrições</a>
                        <ul>
                            <li><a href="#">teste</a></li>
                        </ul>
                    </li>
                    <li id="relatorios"><a href="#">Relatórios</a>
                        <ul>
                            <li><a href="#">teste</a></li>
                        </ul>
                    </li>
                    <li id="suporte"><a href="#">Suporte</a>
                        <ul>
                            <li><a href="#">teste</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </section>
    </div>
    <div class="right">


        <section class="top-menu">
            <h2>COMUNIDADE<span>HERMON</span></h2>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                @csrf
                <button type="submit" name="submit">Sair</button>
            </form>
        </section>


        <section class="main-content">
            @yield('content')
        </section>
    </div>
</body>
</html>
