@extends('layouts.app')

@section('content')

<div class="card">
<div class="card-header">
<h3>Productos</h3>

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
                        <th>Impuesto</th>
						<th>Marca</th>
                        <th>Estado</th>
						<th>Nombre</th>
                        <th>PVC</th>
                        <th>PVP</th>
                        <th>Stock</th>
                        <th>Descripcion</th>
                        <th>Categoría</th>
						<th class="text-center" >
						<a href='{{ url("agregarProd") }}'>
						<img src="imagenes/add.png">
						</a>
						</th>
					</tr>
				</thead>
				<tbody>
					@if(count($productos) > 0)
						@foreach($productos as $article)
						
						<tr>
							<td>{{ $article->Id }}</td>
							<td>{{ $article->Id_Impuestos }}</td>
							<td>{{ $article->Id_Marca }}</td>
                            <td>{{ $article->Id_Estado }}</td>
                            <td>{{ $article->Nombre }}</td>
                            <td>{{ $article->Precio }}</td>
                            <td>{{ $article->PrecioCompra }}</td>
                            <td>{{ $article->Stock }}</td>
                            <td>{{ $article->Descripcion }}</td>
                            <td>{{ $article->Id_Categoria }}</td>
							<td class="text-center">
									<a href='{{ url("actualizarProd/{$article->Id}") }}' ><img src="imagenes/actu.png"></a> |
								<a href='{{ url("borrarProd/{$article->Id}") }}'  onclick="return confirm('Esta seguro que desea eliminar el dato?');"><img src="imagenes/elim.png"></a> 
							</td>
						</tr>
						
						@endforeach
					@endif
				</tbody>
			</table>
			</div>
 
 {!! $productos->render() !!}

 <strong>{{ $productos->total() }} registros | páginas {{ $productos->currentPage() }} de {{ $productos->lastPage() }}</strong>
</div>
</div>

@endsection