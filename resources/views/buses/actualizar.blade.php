@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal" method="POST" action="{{ url('/editB',array($buses->Id)) }}">
					{{csrf_field()}}
				  <fieldset>
				    <legend class="text-center">Actualizar Buses</legend>
				    @if(count($errors) >0 )
				    	@foreach($errors->all() as $error)
				    		<div class="alert alert-danger">
				    			{{$error}}
				    		</div>
				    	@endforeach
				    @endif
					<div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Coopetiva</label>
				      <div class="col-lg-10">
				      	
					  <select class="form-control" name="Id_Cooperativa" class="form-group">
                            
					  @foreach($cooperativasAll as $cooperativaAll)

					   @if( $cooperativaAll -> Id == $cooperativa -> Id )
					   <option selected="true" value="{{ $cooperativaAll->Id }}">
                                    {{$cooperativaAll->Nombre}}
                                </option>
				    	@else
                                <option value="{{ $cooperativaAll->Id }}">
                                    {{$cooperativaAll->Nombre}}
                                </option>
								@endif		
				    		  
				    	    @endforeach
				    		  
				    	   
                        </select>

				      </div>
				 	</div>

				    <div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Placa</label>
				      <div class="col-lg-10">
				      	<input type="text" name="Placa" class="form-control" id="Placa" placeholder="Placa" value="<?php echo $buses->Placa; ?>">
				      </div>
				 	</div>
				 	<div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Serie_Chasis</label>
				      <div class="col-lg-10">
					  <input type="text" name="Serie_Chasis" class="form-control" id="Serie_Chasis" placeholder="Serie_Chasis" value="<?php echo $buses->Serie_Chasis; ?>">
	
				      	</textarea>
				      </div>
				 	</div>

					<div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Anio</label>
				      <div class="col-lg-10">
				      	<input type="text" name="Anio" class="form-control" id="Anio" placeholder="Anio" value="<?php echo $buses->Anio; ?>">
				      </div>
				 	</div>

					<div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">N_Disco</label>
				      <div class="col-lg-10">
				      	<input type="text" name="N_Disco" class="form-control" id="N_Disco" placeholder="N_Disco" value="<?php echo $buses->N_Disco; ?>">
				      </div>
				 	</div>


					 <div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Marca</label>
				      <div class="col-lg-10">
				      	
					  <select class="form-control" name="Id_Marca" class="form-group">
                            
					  @foreach($marcasAll as $marcaAll)

					   @if( $marcaAll -> Id == $marca -> Id )
					   <option selected="true" value="{{ $marcaAll->Id }}">
                                    {{$marcaAll->Nombre}}
                                </option>
				    	@else
                                <option value="{{ $marcaAll->Id }}">
                                    {{$marcaAll->Nombre}}
                                </option>
								@endif		
				    		  
				    	    @endforeach
				    		  
				    	   
                        </select>

				      </div>
				 	</div>

					

				 	<div class="form-group">
				 		<div class="col-lg-10 col-lg-offset-2">
				 			<button type="submit" class="btn btn-primary">Actualizar</button>

				 			<a href="{{ url('/buses')}}" class="btn btn-primary">Atrás</a>
				 		</div>
				 	</div>
				  </fieldset>
				</form>
			</div>
		</div>
	</div>
    @endsection