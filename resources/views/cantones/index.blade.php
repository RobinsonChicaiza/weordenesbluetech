@extends('layouts.app')

@section('content')

<div class="card">
<div class="card-header">
<h3>Cantones</h3>

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
                        <th>Provincia</th>
						<th>Nombre</th>
						<th class="text-center" >
						<a href='{{ url("agregarCa") }}'>
						<img src="imagenes/add.png">
						</a>
						</th>
					</tr>
				</thead>
				<tbody>
					@if(count($cantones) > 0)
						@foreach($cantones as $article)
						
						<tr>
							<td>{{ $article->Id }}</td>
							<td>{{ $article->Id_Provincia }}</td>
							<td>{{ $article->Nombre }}</td>
							<td class="text-center">
								<a href='{{ url("actualizarCa/{$article->Id}") }}' ><img src="imagenes/actu.png"></a> |
								<a href='{{ url("borrarCa/{$article->Id}") }}' onclick="return confirm('Esta seguro que desea eliminar el dato?');"><img src="imagenes/elim.png"></a> 
							</td>
						</tr>
						
						@endforeach
					@endif
				</tbody>
			</table>
			</div>
 
 {!! $cantones->render() !!}

 <strong>{{ $cantones->total() }} registros | páginas {{ $cantones->currentPage() }} de {{ $cantones->lastPage() }}</strong>
</div>
</div>

@endsection