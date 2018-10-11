@extends('layouts.app')

@section('content')

<div class="card">
<div class="card-header">
<h3>Regiones</h3>

</div>
<div class="card-body">			
			
					@if(session('info'))
						<div class="alert alert-success">
							{{session('info')}}
						</div>	
					@endif		
			
            <div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th class="text-center" >
						<a href='{{ url("agregarRe") }}'>
						<img src="imagenes/add.png">
						</a>
						</th>
					</tr>
				</thead>
				<tbody>
					@if(count($regiones) > 0)
						@foreach($regiones->all() as $article)
						<tr>
							<td>{{ $article->Id }}</td>
							<td>{{ $article->Nombre }}</td>
							<td class="text-center">
								<a href='{{ url("actualizarRe/{$article->Id}") }}'><img src="imagenes/actu.png"></a> |
								<a href='{{ url("borrarRe/{$article->Id}") }}' onclick="return confirm('Esta seguro que desea eliminar el dato?');"><img src="imagenes/elim.png"></a> 
							</td>
						</tr>
						@endforeach
					@endif
				</tbody>
			</table>
			</div>
 
		{!! $regiones->render() !!}
	
		<strong>{{ $regiones->total() }} registros | páginas {{ $regiones->currentPage() }} de {{ $regiones->lastPage() }}</strong>
	</div>
	</div>

@endsection