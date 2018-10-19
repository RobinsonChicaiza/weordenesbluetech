@extends('layouts.app')

@section('content')

<div class="card">
<div class="card-header">
<h3>Tipos Marcas</h3>

</div>
<div class="card-body">

					@if(session('info'))
						<div class="alert alert-success">
							{{session('info')}}
						</div>	
					@endif

					<div class="table-responsive">
				
					<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th class="text-center" >
						<a href='{{ url("agregarT") }}'>
						<img src="imagenes/add.png">
						</a>
						</th>
					</tr>
				</thead>
				<tbody>
					@if(count($tiposmarcas) > 0)
						@foreach($tiposmarcas->all() as $article)
						<tr>
							<td>{{ $article->Id }}</td>
							<td>{{ $article->Nombre }}</td>
							<td class="text-center">
								<a href='{{ url("actualizarT/{$article->Id}") }}'><img src="imagenes/actu.png"></a> |
								<a href='{{ url("borrarT/{$article->Id}") }}' onclick="return confirm('Esta seguro que desea eliminar el dato?');"><img src="imagenes/elim.png"></a> 
							</td>
						</tr>
						@endforeach
					@endif
				</tbody>
			</table>
			</div>
 
 {!! $tiposmarcas->render() !!}
 <strong>{{ $tiposmarcas->total() }} registros | páginas {{ $tiposmarcas->currentPage() }} de {{ $tiposmarcas->lastPage() }}</strong>

</div>
</div>

@endsection