@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil de usuario</div>

                <div class="card-body">
                    @if (session('info'))
                        <div class="alert alert-success" role="alert">
                            {{ session('info') }}
                        </div>
                    @endif
                    <div class="container">
                    <section class="main row">
                    
                    <aside class="col-xs-12 col-sm-8 col-md-9 col-lg-7">
                    <div class="container">
                    <p >
                    <h1>{{ Auth::user()->Nombres }}</h1>
                    </p>
                 <p>
                 <img src="{{ Auth::user()->Url_Foto }}" width="300" height="300">
                 </p>
                 </aside>
                 <article class="col-xs-12 col-sm-4 col-md-3 col-lg-5">
                 <br />
                 <br />
                 <br />
                    <p>
                    <strong>Datos Personales</strong>                   
                    </p>
                    <p>
                    Rol: Cliente.                   
                    </p>
                    <p>                    
                    Email: {{ Auth::user()->Correo }}
                    </p>
                    <p>
                    Cédula: {{ $persona['Ci'] }}.                   
                    </p>
                    <p>                    
                    Ruc: {{ $persona['Ruc'] }}.
                    </p>
                    <p>                    
                    Teléfono: {{ $persona['Telefono'] }}.
                    </p>
                    </div>
                    </article>
                    </section>

                    <!-- otra seccion -->

                    <section class="main row">
                    
                
                 <article class="col-xs-12 col-sm-4 col-md-3 col-lg-5">
                 <br />
                 <br />
                 <br />
                    <p>
                    <strong>Datos Referencia N° 1</strong>                   
                    </p>
                    <p>
                    Rol: Cliente.                   
                    </p>
                    <p>                    
                    Email: {{ Auth::user()->Correo }}
                    </p>
                    <p>
                    Cédula: {{ $persona['Ci'] }}.                   
                    </p>
                    <p>                    
                    Ruc: {{ $persona['Ruc'] }}.
                    </p>
                    <p>                    
                    Teléfono: {{ $persona['Telefono'] }}.
                    </p>
                    
                    </article>

                 <article class="col-xs-12 col-sm-4 col-md-3 col-lg-5">
                 <br />
                 <br />
                 <br />
                    <p>
                    <strong>Datos Referencia N° 2</strong>                   
                    </p>
                    <p>
                    Rol: Cliente.                   
                    </p>
                    <p>                    
                    Email: {{ Auth::user()->Correo }}
                    </p>
                    <p>
                    Cédula: {{ $persona['Ci'] }}.                   
                    </p>
                    <p>                    
                    Ruc: {{ $persona['Ruc'] }}.
                    </p>
                    <p>                    
                    Teléfono: {{ $persona['Telefono'] }}.
                    </p>
                    
                    </article>
                    </section>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
