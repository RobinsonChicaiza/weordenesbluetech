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
                 <img src="{{ Auth::user()->Url_Foto }}">
                 </p>
                 </aside>
                 <article class="col-xs-12 col-sm-4 col-md-3 col-lg-5">
                 <br />
                 <br />
                 <br />
                    <p>
                    Rol: Cliente.                   
                    </p>
                    <p>                    
                    Email:{{ Auth::user()->Correo }}
                    </p>
                    <p>                    
                    CI: {{ $persona->Ci }}
                    </p>
                    </div>
                    </article>
                    </section>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
