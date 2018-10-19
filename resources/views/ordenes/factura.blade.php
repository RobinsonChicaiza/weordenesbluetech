@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Factura Nº:
        <strong>01/01/01/2018</strong>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <h3>Vista ordenes</h3>
                @include('ordenes.search')

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                                <th>ID</th>
                                <th>N° Orden</th>
                                <th>Cliente</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Total</th>
                                
                        </thead>
                        @if(count($ordenes) > 0)
						@foreach($ordenes->all() as $dato)
						<tr>
							<td>{{ $dato->Id }}</td>
							<td>{{ $dato->N_Orden }}</td>
                            <td>{{ $dato->Nombres }}</td>
							<td>{{ $dato->Fecha_Inicio }}</td>
                            <td>{{ $dato->Fecha_Finalizacion }}</td>
							<td>{{ $dato->Precio_Total }}</td>
                            
							
						</tr>
						@endforeach
					@endif
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection