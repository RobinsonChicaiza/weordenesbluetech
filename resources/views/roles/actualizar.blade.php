@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal" method="POST" action="{{ url('/editR',array($roles->Id)) }}">
					{{csrf_field()}}
				  <fieldset>
				    <legend>Actualizar Cooperativan</legend>
				    @if(count($errors) >0 )
				    	@foreach($errors->all() as $error)
				    		<div class="alert alert-danger">
				    			{{$error}}
				    		</div>
				    	@endforeach
				    @endif
					<div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Departamento</label>
				      <div class="col-lg-10">
				      	
					  <select class="form-control" name="Id_Departamento" class="form-group">
                            @foreach($departament as $departamento)
                                <option value="{{$departamento->Id}}">
                                    {{$departamento->Nombre}}
                                </option>
				    		  
				    	    @endforeach
                        </select>

				      </div>
				 	</div>

				    <div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Nombre</label>
				      <div class="col-lg-10">
				      	<input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Rol" value="<?php echo $roles->Nombre; ?>">
				      </div>
				 	</div>
				 	<div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Sueldo</label>
				      <div class="col-lg-10">
					  <input type="text" name="Sueldo" class="form-control" id="Sueldo" placeholder="Sueldo" value="<?php echo $roles->Sueldo; ?>">
				      	
				      		
				      	</textarea>
				      </div>
				 	</div>

				 	<div class="form-group">
				 		<div class="col-lg-10 col-lg-offset-2">
				 			<button type="submit" class="btn btn-primary">Update</button>

				 			<a href="{{ url('/cooperativas')}}" class="btn btn-primary">Back</a>
				 		</div>
				 	</div>
				  </fieldset>
				</form>
			</div>
		</div>
	</div>
    @endsection