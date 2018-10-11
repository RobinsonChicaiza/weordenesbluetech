@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil de usuario
                <a href='{{ url("actualizarUsuario/{$persona->Id}") }}' style="float:right;"><img src="imagenes/actu.png"></a>

                </div>
                
                <div class="card-body">
                    @if (session('info'))
                        <div class="alert alert-success" role="alert">
                            {{ session('info') }}
                        </div>
                    @endif
                    <div class="container">
                    <section class="main row">
                    
                    <aside class="col-xs-12 col-sm-8 col-md-9 col-lg-7">
                    <p >
                    <h1>{{ $persona['Nombres'] }}</h1>
                    </p>
                    
                 <p>
                 <img width="30%" src="imagenes/user.png"> 
                
       
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
                    Email: {{ $persona['Correo'] }}
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

                    <!-- otra seccion -->

                <section class="main row">
                    
                
                 <article class="col-xs-12 col-sm-4 col-md-3 col-lg-5">
                 <br />
                 <br />
                 <br />
                 <p>
                 <strong>Datos Referencia N° 1</strong>                   
                 </p>
                 @if( !empty($referencia1) )                  
                    
                    <p>                    
                    Email: {{ $referencia1->Correo }}
                    </p>
                    <p>
                    Cédula: {{ $referencia1->Ci }}                   
                    </p>
                    <p>                    
                    Ruc: {{ $referencia1->Ruc }}
                    </p>
                    <p>                    
                    Teléfono: {{ $referencia1->Telefono }}.
                    </p>
                    @else                    
                   
                    <p>                    
                    Email: N/N
                    </p>
                    <p>
                    Cédula: N/N                    
                    </p>
                    <p>                    
                    Ruc: N/N
                    </p>
                    <p>                    
                    Teléfono: N/N
                    </p>
                    @endif
                    </article>

                 <article class="col-xs-12 col-sm-4 col-md-3 col-lg-5">
                 <br />
                 <br />
                 <br />
                    <p>
                    <strong>Datos Referencia N° 2</strong>                   
                    </p>
                    @if( !empty($referencia2) )                  
                    
                    <p>                    
                    Email: {{ $referencia2->Correo }}
                    </p>
                    <p>
                    Cédula: {{ $referencia2->Ci }}                   
                    </p>
                    <p>                    
                    Ruc: {{ $referencia2->Ruc }}
                    </p>
                    <p>                    
                    Teléfono: {{ $referencia2->Telefono }}.
                    </p>
                    @else                    
                   
                    <p>                    
                    Email: N/N
                    </p>
                    <p>
                    Cédula: N/N                    
                    </p>
                    <p>                    
                    Ruc: N/N
                    </p>
                    <p>                    
                    Teléfono: N/N
                    </p>
                    @endif
                    
                    </article>
                    </section>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
