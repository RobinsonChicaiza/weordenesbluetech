@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal" method="post" action="{{ url('/insertRb')}}">
					{{csrf_field()}}
				  <fieldset>
				    <legend>Laravel CRUD Application</legend>
				    @if(count($errors) >0 )
				    	@foreach($errors->all() as $error)
				    		<div class="alert alert-danger">
				    			{{$error}}
				    		</div>
				    	@endforeach
				    @endif


					<div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Persona Cédula</label>
				      <div class="col-lg-10">
				      	
					  <select class="form-control" name="Id_Persona" class="form-group">
                            @foreach($person as $personas)
                                <option value="{{$personas->Id}}">
                                    {{$personas->Ci}}
                                </option>
				    		  
				    	    @endforeach
                        </select>

				      </div>
				 	</div>



					 <div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Placa Bus</label>
				      <div class="col-lg-10">
				      	
					  <select class="form-control" name="Id_Bus" class="form-group">
                            @foreach($buse as $buses)
                                <option value="{{$buses->Id}}">
                                    {{$buses->Placa}}
                                </option>
				    		  
				    	    @endforeach
                        </select>

				      </div>
				 	</div>



					 <div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Fecha_Servidor</label>
				      <div class="col-lg-10">
				      	<input type="text" name="Fecha_Servidor" class="form-control" id="Fecha_Servidor" placeholder="Fecha_Servidor..">
				      </div>
				 	</div>

				 	
				 	<div class="form-group">
				 		<div class="col-lg-10 col-lg-offset-2">
				 			<button type="submit" class="btn btn-primary">Submit</button>
				 			<a href="{{ url('/registrobuses')}}" class="btn btn-primary">Back</a>
				 		</div>
				 	</div>
				  </fieldset>
				</form>
			</div>
		</div>
	</div>
    @endsection