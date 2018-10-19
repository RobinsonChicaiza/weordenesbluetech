@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" width="100%">
                <div class="card-header">
                    <h3>{{ __('Agregar Referencia') }}</h3>
                </div>


                <div class="card-body">
                    @if (!empty($info))
                    <div class="alert alert-danger" role="alert">
                        {{ $info }}
                    </div>
                    @endif
                    <form method="POST" action="{{ url('/agregarReferencia',array($persona)) }}" enctype="multipart/form-data ">
                        @csrf

                        @if(count($errors) >0 )
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{$error}}
                        </div>
                        @endforeach
                        @endif



                        <div class="form-group row">
                            <label for="Ci" class="col-md-4 col-form-label text-md-right">{{ __('Cédula') }}</label>

                            <div class="col-md-6">
                                @if(!empty($personaReferencua))
                                <input id="Ci" type="text" class="form-control{{ $errors->has('Ci') ? ' is-invalid' : '' }}"
                                    name="Ci" value="<?php echo $personaReferencua->Ci; ?>" required autofocus>
                                @else
                                <input id="Ci" type="text" class="form-control{{ $errors->has('Ci') ? ' is-invalid' : '' }}"
                                    name="Ci" required autofocus maxlength="10" onkeypress="return soloNumeros(event)">
                                @endif
                                @if ($errors->has('Ci'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Ci') }}</strong>
                                </span>
                                @endif

                            </div>
                            <div class="right">

                                <a href="#" data-toggle="modal" data-target="#myModal" style="float:right;">
                                    <img src="{{ asset('imagenes/busc.png') }}">
                                </a>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                @if(!empty($personaReferencua))

                                <input id="Nombres" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    name="Nombres" value="<?php echo $personaReferencua->Nombres; ?>" required
                                    autofocus onkeypress="return soloLetras(event)">
                                @else
                                <input id="Nombres" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    name="Nombres" required autofocus onkeypress="return soloLetras(event)">

                                @endif

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="Ruc" class="col-md-4 col-form-label text-md-right">{{ __('Ruc') }}</label>

                            <div class="col-md-6">
                                @if(!empty($personaReferencua))
                                <input id="Ruc" type="text" class="form-control{{ $errors->has('Ruc') ? ' is-invalid' : '' }}"
                                    name="Ruc" value="<?php echo $personaReferencua->Ruc; ?>" required autofocus
                                    onkeypress="return soloNumeros(event)">
                                @else
                                <input id="Ruc" type="text" class="form-control{{ $errors->has('Ruc') ? ' is-invalid' : '' }}"
                                    name="Ruc" required autofocus onkeypress="return soloNumeros(event)" maxlength="13">
                                @endif
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
                                @if(!empty($personaReferencua))

                                <input id="Telefono" type="text" class="form-control{{ $errors->has('Telefono') ? ' is-invalid' : '' }}"
                                    name="Telefono" value="<?php echo $personaReferencua->Telefono; ?>" required
                                    autofocus onkeypress="return soloNumeros(event)">
                                @else
                                <input id="Telefono" type="text" class="form-control{{ $errors->has('Telefono') ? ' is-invalid' : '' }}"
                                    name="Telefono" required autofocus onkeypress="return soloNumeros(event)">

                                @endif
                                @if ($errors->has('Telefono'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Telefono') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                @if(!empty($personaReferencua))

                                <input id="Correo" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="Correo" value="<?php echo $personaReferencua->Correo; ?>" required>
                                @else
                                <input id="Correo" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="Correo" required>
                                @endif
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                </div>
                <hr>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary" id="g">
                            {{ __('Agregar') }}
                        </button>

                        <a href="{{ url('/home')}}" class="btn btn-primary">Atrás</a>

                    </div>
                </div>
                <br />


                </form>
            </div>
        </div>
    </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="myModalLabel">Buscar persona por cédula</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ url('/buscarPersona',array($persona)) }}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <input id="Buscar" type="text" class="form-control" name="Buscar" onkeypress="return validar()"
                        required>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection