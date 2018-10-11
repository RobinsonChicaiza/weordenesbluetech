@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" width="100%">
                <div class="card-header">
				<h3>{{ __('Actializar caregorias') }}</h3>
                
                </div>

                <div class="card-body">
				<form class="form-horizontal" method="POST" action="{{ url('/editCat',array($categorias->Id)) }}">
					@csrf
				 
				    @if(count($errors) >0 )
				    	@foreach($errors->all() as $error)
				    		<div class="alert alert-danger">
				    			{{$error}}
				    		</div>
				    	@endforeach
				    @endif
					
					<div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Nombre</label>
				      <div class="col-md-6">
				      	<input type="text" onkeypress="return soloLetras(event)" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre" value="<?php echo $categorias->Nombre; ?>">
				      </div>
				 	</div>
				 	<div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Descripción</label>
				      <div class="col-md-6">
					  <input type="text" onkeypress="return soloLetras(event)" name="Descripcion" class="form-control" id="Descripcion" placeholder="Descripcion" value="<?php echo $categorias->Descripcion; ?>">
	
				      	</textarea>
				      </div>
				 	</div>


					
					<div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Proveedor</label>
				      <div class="col-md-6">
				      	
					  <select class="form-control" name="Id_Proveedor" class="form-group">
                            
					  @foreach($personasAll as $personaAll)

					   @if( $personaAll -> Id == $categorias -> Id_Proveedor )
					   <option selected="true" value="{{ $personaAll->Id }}">
					   {{$personaAll->Apellidos}}{{$personaAll->Nombres}}
                                </option>
				    	@else
                                <option value="{{ $personaAll->Id }}">
								{{$personaAll->Apellidos}}{{$personaAll->Nombres}}
                                </option>
								@endif		
				    		  
				    	    @endforeach
				    		  
				    	   
                        </select>

				      </div>
				 	</div>


					 <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Estado</label>
				      <div class="col-md-6">
				      	
					  <select class="form-control" name="Id_Estado" class="form-group">
                            
					  @foreach($estadosAll as $estadoAll)

					   @if( $estadoAll -> Id == $estado -> Id )
					   <option selected="true" value="{{ $estadoAll->Id }}">
                                    {{$estadoAll->Nombre}}
                                </option>
				    	@else
                                <option value="{{ $estadoAll->Id }}">
                                    {{$estadoAll->Nombre}}
                                </option>
								@endif		
				    		  
				    	    @endforeach
				    		  
				    	   
                        </select>

				      </div>
				 	</div>

					

				 	<div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
				 			<button type="submit" class="btn btn-primary">Actualizar</button>

				 			<a href="{{ url('/categorias')}}" class="btn btn-primary">Atrás</a>
				 		</div>
				 	</div>
				  
				</form>
				</div>
				</div>
			</div>
		</div>
	</div>
    @endsection