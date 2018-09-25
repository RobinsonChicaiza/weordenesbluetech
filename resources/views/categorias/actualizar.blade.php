@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal" method="POST" action="{{ url('/editCat',array($categorias->Id)) }}">
					{{csrf_field()}}
				  <fieldset>
				    <legend class="text-center">Actualizar Categoría</legend>
				    @if(count($errors) >0 )
				    	@foreach($errors->all() as $error)
				    		<div class="alert alert-danger">
				    			{{$error}}
				    		</div>
				    	@endforeach
				    @endif
					<script type="text/javascript" src="{{url('js/validaciones.js')}}"></script>

					<div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Nombre</label>
				      <div class="col-lg-10">
				      	<input type="text" onkeypress="return soloLetras(event)" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre" value="<?php echo $categorias->Nombre; ?>">
				      </div>
				 	</div>
				 	<div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Descripción</label>
				      <div class="col-lg-10">
					  <input type="text" onkeypress="return soloLetras(event)" name="Descripcion" class="form-control" id="Descripcion" placeholder="Descripcion" value="<?php echo $categorias->Descripcion; ?>">
	
				      	</textarea>
				      </div>
				 	</div>


					
					<div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Proveedor</label>
				      <div class="col-lg-10">
				      	
					  <select class="form-control" name="Id_Proveedor" class="form-group">
                            
					  @foreach($personasAll as $personaAll)

					   @if( $personaAll -> Id == $categorias -> Id )
					   <option selected="true" value="{{ $personaAll->Id }}">
                                    {{$personaAll->Nombre}}
                                </option>
				    	@else
                                <option value="{{ $personaAll->Id }}">
                                    {{$personaAll->Nombres}}
                                </option>
								@endif		
				    		  
				    	    @endforeach
				    		  
				    	   
                        </select>

				      </div>
				 	</div>


					 <div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Estado</label>
				      <div class="col-lg-10">
				      	
					  <select class="form-control" name="Id_Estado" class="form-group">
                            
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