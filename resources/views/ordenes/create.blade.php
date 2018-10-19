@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-header">
        <h3>Ingredo de ordenes</h3>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                @if(count($errors) >0 )
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>

        {!! Form::open(array('url'=>'ordenes','method'=>'POST','autocomplete'=>'off')) !!}
        {{ Form::token() }}

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label>Nombre:</label>
                    <input id="Nombres" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                        name="Nombres" disabled value="{{ $persona[0]['Nombres'] }}">

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label>Cédula:</label>
                    <input id="Ci" type="text" class="form-control{{ $errors->has('Ci') ? ' is-invalid' : '' }}" name="Ci"
                        value="{{ $persona[0]['Ci'] }}" disabled>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label>Teléfono:</label>
                    <input id="Telefono" type="text" class="form-control{{ $errors->has('Telefono') ? ' is-invalid' : '' }}"
                        name="Telefono" value="{{ $persona[0]['Telefono'] }}" disabled>

                </div>
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label>Producto</label>

                    <select class="form-control selectpicker" name="pidproducto" id="pidproducto" data-live-search="true">
                        @foreach($productos as $produc)
                        <option value="{{$produc->Id}}">
                            {{ $produc->Nombre }}
                        </option>

                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label>Precio Unitario:</label>
                    <input id="pprecio" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                        name="pprecio">

                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label>Cantidad:</label>
                    <input id="pcantidad" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                        name="pcantidad">

                </div>
            </div>

            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label>.</label>

                    <button type="button" id="bt_add" class=" form-control btn btn-primary">Agregar</button>

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
                            <th>Opciones</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Sub total</th>


                        </thead>
                        <tbody></tbody>

                        <tfoot>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Sub Total</th>
                            <th>
                                <h4 id="subT">S/ . 0.00</h4>
                            </th>

                        </tfoot>
                        <tfoot>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>IVA</th>
                            <th>
                                <h4 id="iva">S/ . 0.00</h4>
                            </th>

                        </tfoot>
                        <tfoot>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Total</th>
                            <th>
                                <h4 id="total">S/ . 0.00</h4>
                            </th>

                        </tfoot>

                        

                    </table>
                </div>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
                    <button type="button" class="btn btn-danger">Cancelar</button>

                </div>
            </div>
        </div>
    </div> <!-- </div> fin carbody -->
</div>

{!!Form::close()!!}

@push ('scripts')
<script>
    $(document).ready(function () {
        $("#bt_add").click(function () {
            agregar();
        });
    });

    var cont = 0;
    total = 0;
    subtotal = [];
    idProductos = [];
    aux = 0;

    $("#guardar").hide();

    function agregar() {
        idProducto = $("#pidproducto").val();
        producto = $("#pidproducto option:selected").text();
        cantidad = $("#pcantidad").val();
        precio = $("#pprecio").val();

        idProductos[cont] = idProducto; 


   
        if (cont != 0) {
            
            for (var i = 0; i < idProductos.length-1; i++) {
                if (idProductos[i] != idProducto) {
                    aux = 1;

                } else {
                    aux = 0;
                    break;
                }
            }

            if (aux != 0) {
            if (idProducto != "" && cantidad != "" && cantidad > 0 && precio != "") {
            subtotal[cont] = (cantidad * precio);
            total = total + subtotal[cont];

            var fila = '<tr class="selected" id="fila' + cont +
                '"><td><button type="button" class="btn btn-warning" onclick="eliminar(' + cont +
                ');">X</button></td><td><input type="hidden" name="idproducto[]" value="' + idProducto + '">' +
                producto +
                '</td><td><input type="text" name="cantidad[]" class="form-control" maxlength="3" onkeypress="return soloNumeros(event)" value="' + cantidad +
                '"></td><td><input type="text" name="precio[]" class="form-control" value="' + precio + '" readonly></td><td>' + subtotal[cont] +
                '</td></tr>';
            cont++;
            limpiar();
            $("#total").html("S/." + total);
            evaluar();
            $("#detalles").append(fila);

        } else {
            alert('Por favor llene los campos');
        }
            }else{
                alert('El producto ya se encuentra registrado.');

            }

        } else{
        

        if (idProducto != "" && cantidad != "" && cantidad > 0 && precio != "") {
            subtotal[cont] = (cantidad * precio);
            total = total + subtotal[cont];

            var fila = '<tr class="selected" id="fila' + cont +
                '"><td><button type="button" class="btn btn-warning" onclick="eliminar(' + cont +
                ');">X</button></td><td><input type="hidden" name="idproducto[]" value="' + idProducto + '">' +
                producto +
                '</td><td><input type="text" name="cantidad[]" class="form-control" maxlength="3" onkeypress="return soloNumeros(event)" value="' + cantidad +
                '"></td><td><input type="text" name="precio[]" class="form-control" value="' + precio + '" readonly></td><td>' + subtotal[cont] +
                '</td></tr>';
            cont++;
            limpiar();
            $("#total").html("S/." + total);
            evaluar();
            $("#detalles").append(fila);

        } else {
            alert('Por favor llene los campos');
        }

        }
    }

    function limpiar() {
        $("#pcantidad").val("");
        $("#pprecio").val("");
    }

    function evaluar() {
        if (total > 0) {
            $("#guardar").show();

        } else {
            $("#guardar").hide();

        }
    }

    function eliminar(index) {
        idProductos.splice(index, 1);

        total = total - subtotal[index];
        $("#total").html("S/." + total);
        $("#fila" + index).remove();

    }
</script>
@endpush
@endsection