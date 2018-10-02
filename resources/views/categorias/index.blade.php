@extends('layouts.app')

@section('content')

<div class="container">
		<div class="row">
			<legend class="text-center">Categorias</legend>
			<div class="row">
				<div class="col-md-30 col-lg-30">
					@if(session('info'))
						<div class="alert alert-success">
							{{session('info')}}
						</div>	
					@endif
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
                        <th>Nombre</th>
						<th>Descripción</th>
                        <th>Proveedor</th>
						<th>Estado</th>
						<th class="text-center" >
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
							<td>{{ $article->Nombre }} </td>
							<td>{{ $article->Descripcion }}</td>
                            <td>{{ $article->Id_Proveedor }}</td>
							<td>{{ $article->Id_Estado }}</td>
							<td class="text-center">
								<a href='{{ url("actualizarCat/{$article->Id}") }}' ><img src="imagenes/actu.png"></a> |
								<a href='{{ url("borrarCat/{$article->Id}") }}'  onclick="return confirm('Esta seguro que desea eliminar el dato?');"><img src="imagenes/elim.png"></a> 
							</td>
						</tr>
						
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>

@endsection