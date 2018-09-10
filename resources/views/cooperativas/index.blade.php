@extends('layouts.app')

@section('content')

<div class="container">
		<div class="row">
			<legend>Cooperativa</legend>
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
						<th>Ruc</th>
						<th class="text-center" >
						<a href='{{ url("agregarCooperativa") }}'>
						<img src="imagenes/save.png">
						</a>
						</th>
					</tr>
				</thead>
				<tbody>
					@if(count($cooperativas) > 0)
						@foreach($cooperativas->all() as $article)
						<tr>
							<td>{{ $article->Id }}</td>
							<td>{{ $article->Nombre }}</td>
							<td>{{ $article->Ruc }}</td>
							<td class="text-center">
								
								<a href='{{ url("actualizar/{$article->Id}") }}' ><img src="imagenes/update.png"></a> |
								<a href='{{ url("borrar/{$article->Id}") }}'  onclick="return confirm('Are you sure you want to delete this item?');"><img src="imagenes/delete.png"></a> 
							</td>
						</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>

@endsection