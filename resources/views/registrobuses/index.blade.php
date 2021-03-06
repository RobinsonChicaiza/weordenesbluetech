@extends('layouts.app')

@section('content')

<div class="card">
<div class="card-header">
<h3>Registro buses</h3>

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
                        <th>CI Persona</th>
						<th>Placa Bus</th>
                        <th>Fecha Servidor</th>
						<th class="text-center" >
						<a href='{{ url("agregarRb") }}'>
						<img src="imagenes/add.png">
						</a>
						</th>
					</tr>
				</thead>
				<tbody>
					@if(count($registrobuses) > 0)
						@foreach($registrobuses as $article)
						
						<tr>
							<td>{{ $article->Id }}</td>
							<td>{{ $article->Id_Persona }}</td>
							<td>{{ $article->Id_Bus }}</td>
                            <td>{{ $article->Fecha_Servidor }}</td>
							<td class="text-center">
								<a href='{{ url("actualizarRb/{$article->Id}") }}' ><img src="imagenes/actu.png"></a> |
								<a href='{{ url("borrarRb/{$article->Id}") }}'  onclick="return confirm('Esta seguro que desea eliminar el dato?');"><img src="imagenes/elim.png"></a> 
							</td>
						</tr>
						
						@endforeach
					@endif
				</tbody>
			</table>
			</div>
 
 {!! $registrobuses->render() !!}

 <strong>{{ $registrobuses->total() }} registros | páginas {{ $registrobuses->currentPage() }} de {{ $registrobuses->lastPage() }}</strong>
</div>
</div>

@endsection