@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" width="100%">
                <div class="card-header">
				<h3>{{ __('Actializar registro buses') }}</h3>
                
                </div>

                <div class="card-body">
				<form class="form-horizontal" method="POST" action="{{ url('/editRb',array($registrobuses->Id)) }}">
					{{csrf_field()}}
				 
				    @if(count($errors) >0 )
				    	@foreach($errors->all() as $error)
				    		<div class="alert alert-danger">
				    			{{$error}}
				    		</div>
				    	@endforeach
				    @endif
					<div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Persona</label>
				      <div class="col-md-6">
				      	
					  <select class="form-control" name="Id_Persona" class="form-group row">
                            
					  @foreach($personasAll as $personaAll)

					   @if( $personaAll -> Id == $persona -> Id )
					   <option selected="true" value="{{ $personaAll->Id }}">
                                    {{$personaAll->Ci}}
                                </option>
				    	@else
                                <option value="{{ $personaAll->Id }}">
                                    {{$personaAll->Ci}}
                                </option>
								@endif		
				    		  
				    	    @endforeach
				    		  
				    	   
                        </select>

				      </div>
				 	</div>


					 <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Placa</label>
				      <div class="col-md-6">
				      	
					  <select class="form-control" name="Id_Bus" class="form-group row">
                            
					  @foreach($busesAll as $busAll)

					   @if( $busAll -> Id == $bus -> Id )
					   <option selected="true" value="{{ $busAll->Id }}">
                                    {{$busAll->Placa}}
                                </option>
				    	@else
                                <option value="{{ $busAll->Id }}">
                                    {{$busAll->Placa}}
                                </option>
								@endif		
				    		  
				    	    @endforeach
				    		  
				    	   
                        </select>

				      </div>
				 	</div>

				    <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Placa</label>
				      <div class="col-md-6">
				      	<input type="text" name="Fecha_Servidor" class="form-control" id="Fecha_Servidor" placeholder="Fecha_Servidor" value="<?php echo $registrobuses->Fecha_Servidor; ?>">
				      </div>
				 	</div>
				 	
	

				 	<div class="form-group row mb-0">
				 		<div class="col-md-6 offset-md-4">
				 			<button type="submit" class="btn btn-primary">Actualizar</button>

				 			<a href="{{ url('/registrobuses')}}" class="btn btn-primary">Atrás</a>
				 		</div>
				 	</div>
				
				</form>
				</div>
				</div>
			</div>
		</div>
	</div>
    @endsection