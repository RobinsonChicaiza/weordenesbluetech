@extends('layouts.app')

@section('content')

<div class="card">
<div class="card-header">
<h3>Provincias</h3>

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
                        <th>Region</th>
						<th>Nombre</th>
						<th class="text-center" >
						<a href='{{ url("agregarPr") }}'>
						<img src="imagenes/add.png">
						</a>
						</th>
					</tr>
				</thead>
				<tbody>
					@if(count($provincias) > 0)
						@foreach($provincias as $article)
						
						<tr>
							<td>{{ $article->Id }}</td>
							<td>{{ $article->Id_Region }}</td>
							<td>{{ $article->Nombre }}</td>
							<td class="text-center">
								<a href='{{ url("actualizarPr/{$article->Id}") }}' ><img src="imagenes/actu.png"></a> |
								<a href='{{ url("borrarPr/{$article->Id}") }}' onclick="return confirm('Esta seguro que desea eliminar el dato?');"><img src="imagenes/elim.png"></a> 
							</td>
						</tr>
						
						@endforeach
					@endif
				</tbody>
			</table>
			</div>
 
 {!! $provincias->render() !!}

 <strong>{{ $provincias->total() }} registros | páginas {{ $provincias->currentPage() }} de {{ $provincias->lastPage() }}</strong>
</div>
</div>

@endsection