@extends('layouts.app')

@section('content')

<div class="card">
<div class="card-header">
<h3>Marcas</h3>

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
                        <th>Tipo Marca</th>
						<th>Nombre</th>
						<th class="text-center" >
						<a href='{{ url("agregarMa") }}'>
						<img src="imagenes/add.png">
						</a>
						</th>
					</tr>
				</thead>
				<tbody>
					@if(count($marcas) > 0)
						@foreach($marcas as $article)
						
						<tr>
							<td>{{ $article->Id }}</td>
							<td>{{ $article->Id_Tipo }}</td>
							<td>{{ $article->Nombre }}</td>
							<td class="text-center">
								<a href='{{ url("actualizarMa/{$article->Id}") }}' ><img src="imagenes/actu.png"></a> |
								<a href='{{ url("borrarMa/{$article->Id}") }}' onclick="return confirm('Esta seguro que desea eliminar el dato?');"><img src="imagenes/elim.png"></a> 
							</td>
						</tr>
						
						@endforeach
					@endif
				</tbody>
			</table>
			</div>
 
 {!! $marcas->render() !!}
 <strong>{{ $marcas->total() }} registros | páginas {{ $marcas->currentPage() }} de {{ $marcas->lastPage() }}</strong>

</div>
</div>

@endsection