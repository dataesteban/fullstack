<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>    
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm" style="background-color:  #17202A;">
            <div class="container">
            <a class="navbar-brand" style="color:White;" href="{{ url('/home') }}">
                    H2O-LAB
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse">
                    @auth
                        @if(Auth::user()->estado == 0)
                            <nav class="navbar navbar-expand-md  shadow-sm ">

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <!-- Left Side Of Navbar -->
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                CLIENTES
                                                    </a>
                                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                
                                                    <a class="dropdown-item"  href="{{url('/usuario_cliente')}}"><i class="bi bi-cloud-plus">{{ __('Listar Clientes')}}</i></a>
                                                </div>
                                            </li>
                                            <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                USUARIO DEL SISTEMA
                                                    </a>
                                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                
                                                    <a class="dropdown-item"  href="{{url('/users')}}"><i class="bi bi-cloud-plus">{{ __('Listar Usuario Del Sistema')}}</i></a>
                                                </div>
                                            </li>
                                            <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                RESULTADO
                                                    </a>
                                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                
                                                    <a class="dropdown-item" href="{{url('/resultado')}}"><i class="bi bi-cloud-plus">{{ __('Listar Resultado')}}</i></a>
                                                </div>
                                            </li>
                                            <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                MUESTRA
                                                    </a>
                                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                
                                                    <a class="dropdown-item" href="{{url('/tomaMuestras')}}"><i class="bi bi-cloud-plus">Listar Muestras</i></a>
                                                    <a class="dropdown-item" href="{{url('/tomaMuestraAgregar')}}"><i class="bi bi-cloud-plus">Agregar Muestra</i></a>
                                                </div>
                                            </li>
                                            
                                        <li class="nav-item dropdown">
                                            <!-- <a class="nav-link dropdown-toggle bi bi-arrow-right-circle-fill" data-toggle="dropdown" href="#" id="navbarDropdownMenuLink" role="button" aria-haspopup="true" aria-expanded="false">TOMAS</a> -->
                                        <div class="dropdown-menu" aria-lebelledby="navbarDropdownMenuLink">
                                                <!-- <a class="nav-link dropdown-toggle bi"class="dropdown-item " href="{{url('/usuario_cliente')}}"><i class="bi bi-cloud-plus">{{ __('Listar Clientes')}}</i></a> -->
                                                <!-- <a class="dropdown-item " href="{{url('/parametro')}}"><i class="bi bi-cloud-plus">{{ __('Listar Parametros')}}</i></a> -->
                                                <!-- <a class="dropdown-item " href="{{url('/users')}}"><i class="bi bi-cloud-plus">{{ __('Listar Usuario Del Sistema')}}</i></a> -->
                                                <!-- <a class="dropdown-item " href="{{url('/resultado')}}"><i class="bi bi-cloud-plus">{{ __('Listar Resultado')}}</i></a> -->
                                                <!-- <a class="dropdown-item" href="{{url('/tomaMuestras')}}"><i class="bi bi-cloud-plus">Listar Muestras</i></a>
                                                <a class="dropdown-item" href="{{url('/tomaMuestraAgregar')}}"><i class="bi bi-cloud-plus">Agregar Muestra</i></a> -->

                                        </li>

                                    </ul>
                            </nav>
                        @endif
                    @endauth

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('INICIAR SESION') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <!-- <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTRARSE') }}</a> -->
                        </li>
                        @endif
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('CERRAR SESION') }}
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
        @auth
            @if(Auth::user()->estado == 0)
                <main class="py-4">
                    @yield('contentApp')
                </main>
            @endif
            @if(Auth::user()->estado == 1)
                <main class="py-4">
                    <h3 class="w-100 text-center">Usuario Deshabilitado</h3>
                </main>
            @endif
        @endauth
        @guest
            <main class="py-4">
                @yield('content')
            </main>
        @endguest
    </div>
</body>

</html>