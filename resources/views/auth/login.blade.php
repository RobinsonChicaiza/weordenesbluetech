@extends('layouts.appInicio')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Iniciar sesión') }}</div>

                <div class="card-body">
       
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                       @csrf 
                         
                        <div class="form-group row">
                            <label for="Correo" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="Correo" type="email" class="form-control{{ $errors->has('Correo') ? ' is-invalid' : '' }}" name="Correo" value="{{ old('Correo') }}" required>

                                @if ($errors->has('Correo'))
                                    <span class="invalid-feedback" role="alert">
                                     <strong>{{ $errors->first('Correo') }}</strong>
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

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Iniciar') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Recuperar su contraseña?') }}
                                </a>
                            </div>
                        </div>

                         <hr>
                        
                         <div class="container">
                         <div class="panel-footer">
                         <a href="{{ url('/auth/facebook') }}" class="btn btn-block btn-social btn-facebook">
                                <span class="fa fa-facebook"></span> {{ __('Iniciar con facebook') }}
                            </a>
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
