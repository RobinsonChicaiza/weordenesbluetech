@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" width="100%">
                <div class="card-header">
					<h3>{{ __('Agregar registro buses') }}</h3>
                
                </div>

                <div class="card-body">
				<form class="form-horizontal" method="post" action="{{ url('/insertRb')}}">
					{{csrf_field()}}
				  <fieldset>
				    
				    @if(count($errors) >0 )
				    	@foreach($errors->all() as $error)
				    		<div class="alert alert-danger">
				    			{{$error}}
				    		</div>
				    	@endforeach
				    @endif


					<div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Persona Cédula</label>
				      <div class="col-md-6">
				      	
					  <select class="form-control" name="Id_Persona" class="form-group row">
                            @foreach($person as $personas)
                                <option value="{{$personas->Id}}">
                                    {{$personas->Ci}}
                                </option>
				    		  
				    	    @endforeach
                        </select>

				      </div>
				 	</div>



					 <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Placa Bus</label>
				      <div class="col-md-6">
				      	
					  <select class="form-control" name="Id_Bus" class="form-group row">
                            @foreach($buse as $buses)
                                <option value="{{$buses->Id}}">
                                    {{$buses->Placa}}
                                </option>
				    		  
				    	    @endforeach
                        </select>

				      </div>
				 	</div>



					 <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Fecha Servidor</label>
				      <div class="col-md-6">
				      	<input type="text" name="Fecha_Servidor" class="form-control" id="Fecha_Servidor" placeholder="Fecha_Servidor..">
				      </div>
				 	</div>

				 	
				 	<div class="form-group row mb-0">
				 		<div class="col-md-6 offset-md-4">
				 			<button type="submit" class="btn btn-primary">Guardar</button>
				 			<a href="{{ url('/registrobuses')}}" class="btn btn-primary">Atrás</a>
				 		</div>
				 	</div>
				  </fieldset>
				</form>
				</div>
				</div>
			</div>
		</div>
	</div>
    @endsection