@extends('layouts.app')

@section('content')

<div class="card">
<div class="card-header">
<h1>Departamentos</h1>

</div>
<div class="card-body">
			<div class="row">
				<div class="col-md-30 col-lg-30">
					@if(session('info'))
						<div class="alert alert-success">
							{{session('info')}}
						</div>	
					@endif
				</div>
			</div>
			<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th class="text-center" >
						<a href='{{ url("agregarD") }}'>
						<img src="imagenes/add.png">
						</a>
						</th>
					</tr>
				</thead>
				<tbody>
					@if(count($departamentos) > 0)
						@foreach($departamentos->all() as $article)
						<tr>
							<td>{{ $article->Id }}</td>
							<td>{{ $article->Nombre }}</td>
							<td class="text-center">
								<a href='{{ url("actualizarD/{$article->Id}") }}'><img src="imagenes/actu.png"></a> |
								<a href='{{ url("borrarD/{$article->Id}") }}' onclick="return confirm('Esta seguro que desea eliminar el dato?');"><img src="imagenes/elim.png"></a> 
							</td>
						</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
		{!! $departamentos->render() !!}
			<strong>{{ $departamentos->total() }} registros | páginas {{ $departamentos->currentPage() }} de {{ $departamentos->lastPage() }}</strong>
		</div>

	</div>
	</div>
	</div>

@endsection