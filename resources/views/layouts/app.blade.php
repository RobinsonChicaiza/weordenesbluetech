<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bluetech') }}</title>    

    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/style.css')}}">

	<script type="text/javascript" src="{{url('js/jquery-3.3.1.js')}}"></script>
	<script type="text/javascript" src="{{url('js/bootstrap.js')}}"></script>

</head>
<body>
    <div class="container">
        <div id="app">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                        <div class="container">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                {{ config('app.name', 'Bluetech') }}
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>


                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                
                                <ul class="navbar-nav mr-auto">

                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Configuraciones
                                </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/cooperativas')}}">Cooperativas</a>
                                    <a class="dropdown-item" href="{{ url('/departamentos')}}">Departamentos</a>
                                    <a class="dropdown-item" href="{{ url('/tiposmarcas')}}">Tipos marcas</a>
                                    <a class="dropdown-item" href="{{ url('/marcas')}}">Marcas</a>
                                    <a class="dropdown-item" href="{{ url('/roles')}}">Roles</a>
                                    <a class="dropdown-item" href="{{ url('/buses')}}">Buses</a>
                                    <a class="dropdown-item" href="{{ url('/regiones')}}">Regiones</a>
                                    <a class="dropdown-item" href="{{ url('/provincias')}}">Provincias</a>
                                    <a class="dropdown-item" href="{{ url('/cantones')}}">Cantones</a>
                                    <a class="dropdown-item" href="{{ url('/impuestos')}}">Impuestos</a>
                                    <a class="dropdown-item" href="{{ url('/registrobuses')}}">Registro Buses</a>                                
                                    <a class="dropdown-item" href="{{ url('/categorias')}}">Categorias</a> 
                                    </div>
                                </li>
                        

                                </ul>

                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ml-auto">
                                    <!-- Authentication Links -->
                                    @guest
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                        </li>
                                    @else
                                
                                        <li class="nav-item dropdown">
                                       
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <img src="imagenes/robin.jpg" width="30" height="30"> {{ Auth::user()->Nombres }} <span class="caret"></span>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Cerrar sesión') }}
                                                </a>

                                                 <a class="dropdown-item" href="{{ url('/home') }}">
                                                     {{ __('Perfil') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </nav>

                <main class="py-4">
                    @yield('content')
                </main> 
                <hr />
        <!-- Site footer -->
        <footer class="footer">
            <p>© Bluetech 2018</p>
        </footer>
        </div>

       
</div>

</body>
</html>
