@extends('layouts.appInicio')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear cuenta de usuario') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
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
                                <input id="Nombres" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="Nombres" value="{{ old('Nombres') }}" required autofocus>

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
                                <input id="Ci" type="text" class="form-control{{ $errors->has('Ci') ? ' is-invalid' : '' }}" name="Ci" value="{{ old('Ci') }}" required autofocus>

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
                                <input id="Ruc" type="text" class="form-control{{ $errors->has('Ruc') ? ' is-invalid' : '' }}" name="Ruc" value="{{ old('Ruc') }}" required autofocus>

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
                                <input id="Telefono" type="text" class="form-control{{ $errors->has('Telefono') ? ' is-invalid' : '' }}" name="Telefono" value="{{ old('Telefono') }}" required autofocus>

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
					  <option selected="true" disabled="disabled">Seleccione el departamento</option>
                            @foreach($canton as $datoCanton)
                                <option value="{{ $datoCanton->Id }}">
                                    {{$datoCanton->Nombre}}
                                </option>
				    		  
				    	    @endforeach
				    		  
                        </select>
                 
				      </div>
				 	</div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="Correo" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="Correo" value="{{ old('Correo') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        <hr>
                        
                        <div class="container">
                         <div class="panel-footer">
                         <!-- <a href="{{ url('/auth/facebook') }}" class="btn btn-block btn-social btn-facebook">
                                <span class="fa fa-facebook"></span> {{ __('Iniciar con facebook') }}
                            </a> -->
                        <a href="{{ url('/auth/google') }}" class="btn btn-block btn-social btn-google">
                                <span class="fa fa-google"></span> {{ __('Iniciar con google') }}
                            </a>
                         
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
