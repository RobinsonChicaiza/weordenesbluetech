@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" width="100%">
                <div class="card-header">
					<h3>{{ __('Agregar categorias') }}</h3>
                
                </div>

                <div class="card-body">
				<form class="form-horizontal" method="post" action="{{ url('/insertCat')}}">
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
				      	<input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre..">
				      </div>
				 	</div>

					<div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Descripción</label>
				     <div class="col-md-6">
				      	<input type="text" name="Descripcion" class="form-control" id="Descripcion" placeholder="Descripcion..">
				      </div>
				 	</div>

					<div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Persona</label>
				     <div class="col-md-6">
				      	
					  <select class="form-control" name="Id_Proveedor" class="form-group row">
                            @foreach($person as $persona)
                                <option value="{{$persona->Id}}">
                                    {{$persona->Nombres}} {{$persona->Apellidos}}
                                </option>
				    		  
				    	    @endforeach
                        </select>

				      </div>
				 	</div>


					<div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Estado</label>
				     <div class="col-md-6">
				      	
					  <select class="form-control" name="Id_Estado" class="form-group row">
                            @foreach($estad as $estado)
                                <option value="{{$estado->Id}}">
                                    {{$estado->Nombre}}
                                </option>
				    		  
				    	    @endforeach
                        </select>

				      </div>
				 	</div>
					
                     
				 	
				 	<div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
				 			<button type="submit" class="btn btn-primary">Agregar</button>
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