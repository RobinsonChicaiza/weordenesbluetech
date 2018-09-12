@extends('layouts.app')

@section('content')

<div class="container">
		<div class="row">
			<legend>Rol</legend>
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
                        <th>Departamento</th>
						<th>Nombre</th>
                        <th>Sueldo</th>
						<th class="text-center" >
						<a href='{{ url("agregarR") }}'>
						<img src="imagenes/add.png">
						</a>
						</th>
					</tr>
				</thead>
				<tbody>
					@if(count($roles) > 0)
						@foreach($roles as $article)
						
						<tr>
							<td>{{ $article->Id }}</td>
							<td>{{ $article->Id_Departamento }}</td>
							<td>{{ $article->Nombre }}</td>
                            <td>{{ $article->Sueldo }}</td>
							<td class="text-center">
								<a href='{{ url("actualizarR/{$article->Id}") }}' ><img src="imagenes/actu.png"></a> |
								<a href='{{ url("borrarR/{$article->Id}") }}' onclick="return confirm('Esta seguro que desea eliminar el dato?');"><img src="imagenes/elim.png"></a> 
							</td>
						</tr>
						
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>

@endsection