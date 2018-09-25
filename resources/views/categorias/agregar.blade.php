@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal" method="post" action="{{ url('/insertCat')}}">
					{{csrf_field()}}
				  <fieldset>
				    <legend class="text-center">Agregar Categorias</legend>
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
				      	<input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre..">
				      </div>
				 	</div>

					<div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Descripcion</label>
				      <div class="col-lg-10">
				      	<input type="text" name="Descripcion" class="form-control" id="Descripcion" placeholder="Descripcion..">
				      </div>
				 	</div>

					<div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Persona</label>
				      <div class="col-lg-10">
				      	
					  <select class="form-control" name="Id_Proveedor" class="form-group">
                            @foreach($person as $persona)
                                <option value="{{$persona->Id}}">
                                    {{$persona->Nombres}}  {{$persona->Apellidos}}
                                </option>
				    		  
				    	    @endforeach
                        </select>

				      </div>
				 	</div>


					<div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Estado</label>
				      <div class="col-lg-10">
				      	
					  <select class="form-control" name="Id_Estado" class="form-group">
                            @foreach($estad as $estado)
                                <option value="{{$estado->Id}}">
                                    {{$estado->Nombre}}
                                </option>
				    		  
				    	    @endforeach
                        </select>

				      </div>
				 	</div>

					
                     
				 	
				 	<div class="form-group">
				 		<div class="col-lg-10 col-lg-offset-2">
				 			<button type="submit" class="btn btn-primary">Agregar</button>
				 			<a href="{{ url('/categorias')}}" class="btn btn-primary">Atrás</a>
				 		</div>
				 	</div>
				  </fieldset>
				</form>
			</div>
		</div>
	</div>
    @endsection