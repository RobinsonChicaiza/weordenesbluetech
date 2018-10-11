@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" width="100%">
                <div class="card-header">{{ __('Agregar Cooperativa') }}
                
                </div>

                <div class="card-body">
				<form class="form-horizontal" method="post" action="{{ url('/insertC')}}">
                        @csrf

                         @if(count($errors) >0 )
				    	@foreach($errors->all() as $error)
				    		<div class="alert alert-danger">
				    			{{$error}}
				    		</div>
				    	@endforeach
                    @endif             

				    <div class="form-group row">
				      <label for="exampleInputEmail1"  class="col-md-4 col-form-label text-md-right">Nombre</label>
					  <div class="col-md-6">
				      	<input type="text" onkeypress="return soloLetras(event)" name="Nombre" class="form-control" id="Nombre" placeholder="Cooperativa..">
				      </div>
					 </div>
					 
				 	<div class="form-group row">
				      <label for="exampleInputEmail1"     class="col-md-4 col-form-label text-md-right">Ruc</label>
					  <div class="col-md-6">
                      <input type="text" onkeypress="return soloNumeros(event)" name="Ruc" class="form-control" id="Ruc" maxlength="13" placeholder="012588..">
				      		
				      	</textarea>
				      </div>
				 	</div>

				 	<div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
				 			<button type="submit" class="btn btn-primary">Guardar</button>


				 			<a href="{{ url('/cooperativas')}}" class="btn btn-primary">Atrás</a>
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