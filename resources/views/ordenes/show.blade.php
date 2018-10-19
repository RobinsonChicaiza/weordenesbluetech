@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-header">
        <h3>Vista ordenes</h3>
    </div>
    <div class="card-body">       
    

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label>Nombre:</label>
                    <input  type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                         disabled value="{{ $ordenes->Nombres }}">

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label>Cédula:</label>
                    <input id="Ci" type="text" class="form-control{{ $errors->has('Ci') ? ' is-invalid' : '' }}" name="Ci"
                        value="{{ $ordenes->Ci }}" disabled>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label>Teléfono:</label>
                    <input id="Telefono" type="text" class="form-control{{ $errors->has('Telefono') ? ' is-invalid' : '' }}"
                        name="Telefono" value="{{ $ordenes->Telefono }}" disabled>

                </div>
            </div>
        </div>

        <hr />
        <br />
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Iva</th>
                            <th>Sub total</th>


                        </thead>
                        <tbody>
                        @if(count($detalle) > 0)
						@foreach($detalle->all() as $dato)
						<tr>
							<td>{{ $dato->Nombre }}</td>
							<td>{{ $dato->Cantidad }}</td>
                            <td>{{ $dato->PVP }}</td>
							<td>{{ $dato->ValorIva }}</td>
                            <td>{{ $dato->SubTotal }}</td>
          
						</tr>
						@endforeach
					@endif
                        </tbody>
                        <tfoot>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Total</th>
                            <th>
                                <h4 id="total">
                                $. {{ $ordenes->Precio_Total }}
                                </h4>
                            </th>

                        </tfoot>
                        <tfoot>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Sub Total</th>
                            <th>
                                <h4 id="subT">$ . {{ $subT }}</h4>
                            </th>

                        </tfoot>
                        <tfoot>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>IVA</th>
                            <th>
                                <h4 id="iva">$ . {{ $ordenes->IVA }}</h4>
                            </th>

                        </tfoot>





                    </table>
                </div>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <!-- <button type="submit" class="btn btn-primary" id="guardar">Guardar</button> -->
                    <a href="{{ url('ordenes') }}" class="btn btn-danger">Atras</a>

                </div>
            </div>
        </div>
    </div> <!-- </div> fin carbody -->
</div>



@endsection