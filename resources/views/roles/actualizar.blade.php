@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" width="100%">
                <div class="card-header">
				<h3>{{ __('Actializar roles') }}</h3>
                
                </div>

                <div class="card-body">

				<form class="form-horizontal" method="POST" action="{{ url('/editR',array($roles->Id)) }}">
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
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Departamento</label>
				      <div class="col-md-6">
				      	
					  <select class="form-control" name="Id_Departamento" class="form-group">
                            
					  @foreach($departamentosAll as $departamentoAll)

					   @if( $departamentoAll -> Id == $departamento -> Id )
					   <option selected="true" value="{{ $departamentoAll->Id }}">
                                    {{$departamentoAll->Nombre}}
                                </option>
				    	@else
                                <option value="{{ $departamentoAll->Id }}">
                                    {{$departamentoAll->Nombre}}
                                </option>
								@endif		
				    		  
				    	    @endforeach
				    		  
				    	   
                        </select>

				      </div>
				 	</div>

				    <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Nombre</label>
				      <div class="col-md-6">
				      	<input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Rol" value="<?php echo $roles->Nombre; ?>">
				      </div>
				 	</div>
				 	<div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Sueldo</label>
				      <div class="col-md-6">
					  <input type="text" name="Sueldo" class="form-control" id="Sueldo" placeholder="Sueldo" value="<?php echo $roles->Sueldo; ?>">
				      	
				      		
				      	</textarea>
				      </div>
				 	</div>

				 	<div class="form-group row mb-0">
				 		<div class="col-md-6 offset-md-4">
				 			<button type="submit" class="btn btn-primary">Actualizar</button>

				 			<a href="{{ url('/roles')}}" class="btn btn-primary">Atrás</a>
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