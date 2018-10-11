@extends('layouts.app')

@section('content')


<div class="card">
<div class="card-header">
<h1>Cooperativas</h1>

</div>
<div class="card-body">
		<div class="row">	
			
					@if(session('info'))
						<div class="alert alert-success">
							{{session('info')}}
						</div>	
					@endif
			
				<div class="table-responsive">

				<table class="table table-striped table-hover">
				<thead>
				
					<tr>
						<th>N°</th>
						<th>Nombre</th>
						<th>Ruc</th>
						<th class="text-center" >
						<a href='{{ url("agregarC") }}'>
						<img src="imagenes/add.png">
						</a>
						</th>
					</tr>
				</thead>
				<tbody>
					@if(count($cooperativas) > 0)
					<?php $a = 0; ?>
						@foreach($cooperativas->all() as $article)
						<?php $a++; ?>                  
						<tr>
							<td>{{ $a }}</td>
							<td>{{ $article->Nombre }}</td>
							<td>{{ $article->Ruc }}</td>
							<td class="text-center">
								
								<a href='{{ url("actualizarC/{$article->Id}") }}' ><img src="imagenes/actu.png"></a> |
								<a href='{{ url("borrarC/{$article->Id}") }}'  onclick="return confirm('Esta seguro que desea eliminar el dato?');"><img src="imagenes/elim.png"></a> 
							</td>
						</tr>
						@endforeach
					@endif
				</tbody>

			</table>
		</div>

			{!! $cooperativas->render() !!}
		</div>
		<strong>{{ $cooperativas->total() }} registros | páginas {{ $cooperativas->currentPage() }} de {{ $cooperativas->lastPage() }}</strong>
	</div>
	</div>
	</div>


@endsection