@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h3>Categorias</h3>

    </div>
    <div class="card-body">

        @if(session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
        @endif

		<div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
               
                @include('categorias.search')

            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Proveedor</th>
                        <th>Estado</th>
                        <th class="text-center">
                            <a href='{{ url("agregarCat") }}'>
                                <img src="imagenes/add.png">
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($categorias) > 0)
                    @foreach($categorias as $article)

                    <tr>
                        <td>{{ $article->Id }}</td>
                        <td>{{ $article->Categoria }} </td>
                        <td>{{ $article->Descripcion }}</td>
                        <td>{{ $article->Nombres }}</td>
                        <td>{{ $article->Nombre }}</td>
                        <td class="text-center">
                            <a href='{{ url("actualizarCat/{$article->Id}") }}'><img src="imagenes/actu.png"></a> |
                            <a href='{{ url("borrarCat/{$article->Id}") }}' onclick="return confirm('Esta seguro que desea eliminar el dato?');"><img
                                    src="imagenes/elim.png"></a>
                        </td>
                    </tr>

                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        {!! $categorias->render() !!}

        <strong>{{ $categorias->total() }} registros | páginas {{ $categorias->currentPage() }} de {{
            $categorias->lastPage() }}</strong>
    </div>
</div>

@endsection