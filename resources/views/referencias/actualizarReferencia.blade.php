@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" width="100%">
                <div class="card-header">{{ __('Actualizar Referencia') }}</div>

                <div class="card-body">
                    <form method="POST" 
                    action="{{ url('/updateReferencia',array($persona->Id)) }}"
                    enctype="multipart/form-data">
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
                                <input id="Ci" type="text" class="form-control{{ $errors->has('Ci') ? ' is-invalid' : '' }}" name="Ci" value="<?php echo $persona->Ci; ?>" required autofocus>

                                @if ($errors->has('Ci'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Ci') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>       

                                 <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="Nombres" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="Nombres" value="<?php echo $persona->Nombres; ?>" required autofocus>

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
                                <input id="Ruc" type="text" class="form-control{{ $errors->has('Ruc') ? ' is-invalid' : '' }}" name="Ruc" value="<?php echo $persona->Ruc; ?>" required autofocus>

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
                                <input id="Telefono" type="text" class="form-control{{ $errors->has('Telefono') ? ' is-invalid' : '' }}" name="Telefono" value="<?php echo $persona->Telefono; ?>" required autofocus>

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
                                <input id="Correo" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="Correo" value="<?php echo $persona->Correo; ?>" required>

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
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
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
@endsection
