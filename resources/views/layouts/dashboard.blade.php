<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/ajax.js')}}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/data_picker/flatpckr.js')}}"></script>
    <script src="{{ asset('js/data_picker/pt-br.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/dashboard/dashboard-main.css') }}" rel="stylesheet">
    @yield('assets')
    <link rel="stylesheet" href="{{asset('css/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/flatpickr/dark.css')}}">
</head>


<body>
    <!-- Left Menu -->
    <div class="left">
        <section class="menu">
            <a href="{{url('/dashboard')}}">
                <div class="profile-picture" style="background-image: url({{asset('images/person.png')}}); background-position: center; background-repeat: no-repeat; background-size: cover;">
                </div>
            </a>
            <p class="username">{{ $data['username'] }}</p>
            <p class="cargo">{{ $data['cargo']}}</p>
            <hr>

            <div class="menu-links" id="jq-menulinks">
                <ul>
                    <li id=""><a href="{{url('/dashboard')}}">Início</a></li>
                    <li id="internos"><a href="#">Internos</a>
                        <ul>
                            <li><a href="{{url('/internos/index')}}">Procurar</a></li>
                            <li><a href="{{url('/internos/create')}}">Novo</a></li>
                        </ul>
                    </li>
                    <li id="usuarios"><a href="#">Usuários</a>
                        <ul>
                            <li><a href="{{route('usuarios')}}">Procurar</a></li>
                        </ul>
                        <ul>
                            <li><a href="{{route('usuarios.registrar')}}">Registrar</a></li>
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
