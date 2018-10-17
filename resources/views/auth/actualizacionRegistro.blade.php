@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" width="100%">
                <div class="card-header">{{ __('Actializar Usuario') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/editUsu',array($persona->Id)) }}" enctype="multipart/form-data">
                        @csrf

                        @if(count($errors) >0 )
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{$error}}
                        </div>
                        @endforeach
                        @endif

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="Nombres" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    name="Nombres" value="<?php echo $persona->Nombres; ?>" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Ci" class="col-md-4 col-form-label text-md-right">{{ __('Cédula') }}</label>

                            <div class="col-md-6">
                                <input id="Ci" type="text" class="form-control{{ $errors->has('Ci') ? ' is-invalid' : '' }}"
                                    name="Ci" value="<?php echo $persona->Ci; ?>" required autofocus>

                                @if ($errors->has('Ci'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Ci') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Ruc" class="col-md-4 col-form-label text-md-right">{{ __('Ruc') }}</label>

                            <div class="col-md-6">
                                <input id="Ruc" type="text" class="form-control{{ $errors->has('Ruc') ? ' is-invalid' : '' }}"
                                    name="Ruc" value="<?php echo $persona->Ruc; ?>" required autofocus>

                                @if ($errors->has('Ruc'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Ruc') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                                <input id="Telefono" type="text" class="form-control{{ $errors->has('Telefono') ? ' is-invalid' : '' }}"
                                    name="Telefono" value="<?php echo $persona->Telefono; ?>" required autofocus>

                                @if ($errors->has('Telefono'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Telefono') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Id_Canton" class="col-md-4 col-form-label text-md-right">{{ __('Ciudad') }}</label>
                            <div class="col-md-6">

                                <select class="form-control" name="Id_Canton" class="form-group">
                                    @foreach($canton as $cant)

                                    @if( $cant -> Id == $cant -> Id_Canton )
                                    <option selected="true" value="{{ $cant->Id }}">
                                        {{$cant->Nombre}}
                                    </option>
                                    @else
                                    <option value="{{ $cant->Id }}">
                                        {{$cant->Nombre}}
                                    </option>
                                    @endif

                                    @endforeach

                                </select>

                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="Correo" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="Correo" value="<?php echo $persona->Correo; ?>" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Imagen" class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}</label>

                            <div class="col-md-6">
                                <input id="imagen" type="file" name="imagen" class="form-control">

                            </div>
                        </div>





                        <div class="form-group row">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <!-- encabezado de tabla -->
                                            <td colspan="7" class="text-center">
                                                <h3>Referencias</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>N°</th>
                                            <th>Nombre</th>
                                            <th>Cédula</th>
                                            <th>RUC</th>
                                            <th>Teléfono</th>
                                            <th>Email</th>
                                            <th class="text-center">
                                                @if( $auxT == 2)

                                                Acción
                                                @else
                                                <a href='{{ url("vistaReferencia/{$persona->Id}") }}'>
                                                    <img src="{{ asset('imagenes/add.png') }}">
                                                </a>
                                                @endif
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if( !empty($referencia1) )
                                        <tr>
                                            @if( $auxT == 2)

                                            <td>1</td>
                                            @else
                                            <td>{{ $auxT }}</td>
                                            @endif
                                            <td>{{ $referencia1->Nombres }}</td>
                                            <td>{{ $referencia1->Ci }}</td>
                                            <td>{{ $referencia1->Ruc }}</td>
                                            <td>{{ $referencia1->Telefono }}</td>
                                            <td>{{ $referencia1->Correo }}</td>
                                            <td class="text-center">
                                                <a href='{{ url("updateReferencia/{$referencia1->Id}") }}'><img src="{{ asset('Imagenes/actu.png') }}"></a>
                                                <a href='{{ url("delereReferencia/{$persona->Id}/{$referencia1->Id}/1") }}'
                                                    onclick="return confirm('Esta seguro que desea eliminar el dato?');"><img
                                                        src="{{ asset('imagenes/elim.png') }}"></a>
                                            </td>
                                        </tr>
                                        @else
                                        @endif

                                        @if( !empty($referencia2) )
                                        <tr>
                                            <td>{{ $auxT }}</td>
                                            <td>{{ $referencia2->Nombres }}</td>
                                            <td>{{ $referencia2->Ci }}</td>
                                            <td>{{ $referencia2->Ruc }}</td>
                                            <td>{{ $referencia2->Telefono }}</td>
                                            <td>{{ $referencia2->Correo }}</td>
                                            <td class="text-center">
                                                <a href='{{ url("updateReferencia/{$referencia2->Id}") }}'><img src="{{ asset('Imagenes/actu.png') }}"
                                                        width="30" height="30"></a>
                                                <a href='{{ url("delereReferencia/{$persona->Id}/{$referencia2->Id}/2") }}'
                                                    onclick="return confirm('Esta seguro que desea eliminar el dato?');"><img
                                                        src="{{ asset('imagenes/elim.png') }}"></a>
                                            </td>

                                        </tr>
                                        @else
                                        @endif


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
                                </button>
                                <a href="{{ url('/home')}}" class="btn btn-primary">Atrás</a>

                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection