@extends('layouts.app')

@section('content')

<div class="card">
<div class="card-header">
<h3>Impuestos</h3>

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
						<th>IVA</th>
						<th class="text-center" >
						<a href='{{ url("agregarIm") }}'>
						<img src="imagenes/add.png">
						</a>
						</th>
					</tr>
				</thead>
				<tbody>
					@if(count($impuestos) > 0)
						@foreach($impuestos->all() as $article)
						<tr>
							<td>{{ $article->Id }}</td>
							<td>{{ $article->IVA }}</td>
							<td class="text-center">
								<a href='{{ url("actualizarIm/{$article->Id}") }}'><img src="imagenes/actu.png"></a> |
								<a href='{{ url("borrarIm/{$article->Id}") }}' onclick="return confirm('Esta seguro que desea eliminar el dato?');"><img src="imagenes/elim.png"></a> 
							</td>
						</tr>
						@endforeach
					@endif
				</tbody>
			</table>
			</div>
 
 {!! $impuestos->render() !!}

 <strong>{{ $impuestos->total() }} registros | páginas {{ $impuestos->currentPage() }} de {{ $impuestos->lastPage() }}</strong>
</div>
</div>

@endsection