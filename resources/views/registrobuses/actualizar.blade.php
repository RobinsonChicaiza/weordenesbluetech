@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal" method="POST" action="{{ url('/editRb',array($registrobuses->Id)) }}">
					{{csrf_field()}}
				  <fieldset>
				    <legend class="text-center">Actualizar Registro Buses</legend>
				    @if(count($errors) >0 )
				    	@foreach($errors->all() as $error)
				    		<div class="alert alert-danger">
				    			{{$error}}
				    		</div>
				    	@endforeach
				    @endif
					<div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Persona</label>
				      <div class="col-lg-10">
				      	
					  <select class="form-control" name="Id_Persona" class="form-group">
                            
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


					 <div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Placa</label>
				      <div class="col-lg-10">
				      	
					  <select class="form-control" name="Id_Bus" class="form-group">
                            
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

				    <div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Placa</label>
				      <div class="col-lg-10">
				      	<input type="text" name="Fecha_Servidor" class="form-control" id="Fecha_Servidor" placeholder="Fecha_Servidor" value="<?php echo $registrobuses->Fecha_Servidor; ?>">
				      </div>
				 	</div>
				 	
	

				 	<div class="form-group">
				 		<div class="col-lg-10 col-lg-offset-2">
				 			<button type="submit" class="btn btn-primary">Actualizar</button>

				 			<a href="{{ url('/registrobuses')}}" class="btn btn-primary">Atrás</a>
				 		</div>
				 	</div>
				  </fieldset>
				</form>
			</div>
		</div>
	</div>
    @endsection