@extends('layouts.app')

@section('content')

<div class="card">
<div class="card-header">
<h1 >Roles</h1>
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
                        <th>Departamento</th>
						<th>Nombre</th>
                        <th>Sueldo</th>
						<th class="text-center" >
						<a href='{{ url("agregarR") }}'>
						<img src="imagenes/add.png">
						</a>
						</th>
					</tr>
				</thead>
				<tbody>
					@if(count($roles) > 0)
						@foreach($roles as $article)
						
						<tr>
							<td>{{ $article->Id }}</td>
							<td>{{ $article->Id_Departamento }}</td>
							<td>{{ $article->Nombre }}</td>
                            <td>{{ $article->Sueldo }}</td>
							<td class="text-center">
								<a href='{{ url("actualizarR/{$article->Id}") }}' ><img src="imagenes/actu.png"></a> |
								<a href='{{ url("borrarR/{$article->Id}") }}' onclick="return confirm('Esta seguro que desea eliminar el dato?');"><img src="imagenes/elim.png"></a> 
							</td>
						</tr>
						
						@endforeach
					@endif
				</tbody>
			</table>
			</div>
			{!! $roles->render() !!}
			<strong>{{ $roles->total() }} registros | páginas {{ $roles->currentPage() }} de {{ $roles->lastPage() }}</strong>
		</div>		
		</div>
	

@endsection