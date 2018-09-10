@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil de usuario</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                    <section class="main row">
                    
                    <aside class="col-xs-12 col-sm-8 col-md-9 col-lg-7">
                    <div class="container">
                    <p >
                    <h1>Robinson Chicaiza</h1>
                    </p>
                 <p>
                 <img src="https://scontent.fuio1-1.fna.fbcdn.net/v/t1.0-9/31234999_1977650045609953_69243716149182464_n.jpg?_nc_cat=0&oh=0d6cacfbf974cb119a8866d0b139a26e&oe=5BF0B972" width="250" height="250">
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
                    Email: robinson@gmail.com.
                    </p>
                    <p>                    
                    Token: gfggdhfvhsgdftyvhsgdvshga
                    </p>
                    <p>                    
                    Telefino: 0254789547.
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
