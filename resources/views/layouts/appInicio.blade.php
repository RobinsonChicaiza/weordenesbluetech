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
	
	<script type="text/javascript" src="{{url('js/jquery-3.3.1.js')}}"></script>
	<script type="text/javascript" src="{{url('js/bootstrap.js')}}"></script>

</head>
<body>
<div class="container">
<div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        @if (Route::has('login'))
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
                    
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            <li class="nav-item">
                            @auth
                            <a class="nav-link" href="{{ url('/home') }}">Inicio</a>
                            @else
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                            </li>                     
                            
                        
                    </ul>
                    @endauth
                </div>
            </div>
            @endif
        </nav>
       
    
        <main class="py-4">
            @yield('content')
        </main>

        
    </div>

        <hr />
      <!-- Site footer -->
      <footer class="footer">
        <p>© Bluetech 2018</p>
      </footer>
</div>
    
      
</body>
</html>
