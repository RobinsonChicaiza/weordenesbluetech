@extends('layouts.app')

@section('content')

<div class="card">
<div class="card-header">
<h3>Buses</h3>

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
                        <th>Cooperativa</th>
						<th>Placa</th>
                        <th>Marca_Chasis</th>
						<th>Serie_Chasis</th>
                        <th>Anio</th>
                        <th>N_Disco</th>
						<th class="text-center" >
						<a href='{{ url("agregarB") }}'>
						<img src="imagenes/add.png">
						</a>
						</th>
					</tr>
				</thead>
				<tbody>
					@if(count($buses) > 0)
						@foreach($buses as $article)
						
						<tr>
							<td>{{ $article->Id }}</td>
							<td>{{ $article->Id_Cooperativa }}</td>
							<td>{{ $article->Placa }}</td>
                            <td>{{ $article->Id_Marca }}</td>
                            <td>{{ $article->Serie_Chasis }}</td>
                            <td>{{ $article->Anio }}</td>
                            <td>{{ $article->N_Disco }}</td>
							<td class="text-center">
									<a href='{{ url("actualizarB/{$article->Id}") }}' ><img src="imagenes/actu.png"></a> |
								<a href='{{ url("borrarB/{$article->Id}") }}'  onclick="return confirm('Esta seguro que desea eliminar el dato?');"><img src="imagenes/elim.png"></a> 
							</td>
						</tr>
						
						@endforeach
					@endif
				</tbody>
			</table>
			</div>
 
 {!! $buses->render() !!}

 <strong>{{ $buses->total() }} registros | páginas {{ $buses->currentPage() }} de {{ $buses->lastPage() }}</strong>
</div>
</div>

@endsection