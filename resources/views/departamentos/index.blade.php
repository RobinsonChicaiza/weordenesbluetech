@extends('layouts.app')

@section('content')

<div class="container">
		<div class="row">
			<legend>Departamento</legend>
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
						<th>Nomnre</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($departamentos) > 0)
						@foreach($departamentos->all() as $article)
						<tr>
							<td>{{ $article->Id }}</td>
							<td>{{ $article->Nombre }}</td>
							<td>
								<a href='{{ url("agregar") }}' class="btn btn-primary">Agregar</a> |
								<a href='{{ url("actualizar/{$article->Id}") }}' class="btn btn-success">Actualizar</a> |
								<a href='{{ url("borrar/{$article->Id}") }}' class="btn btn-danger"  onclick="return confirm('Are you sure you want to delete this item?');">Borrar</a> 
							</td>
						</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>

@endsection