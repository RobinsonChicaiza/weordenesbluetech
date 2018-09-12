@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal" method="post" action="{{ url('/insertB')}}">
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
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Cooperativa</label>
				      <div class="col-lg-10">
				      	
					  <select class="form-control" name="Id_Cooperativa" class="form-group">
                            @foreach($cooperativ as $cooperativa)
                                <option value="{{$cooperativa->Id}}">
                                    {{$cooperativa->Nombre}}
                                </option>
				    		  
				    	    @endforeach
                        </select>

				      </div>
				 	</div>

					 <div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Placa</label>
				      <div class="col-lg-10">
				      	<input type="text" name="Placa" class="form-control" id="Placa" placeholder="Placa..">
				      </div>
				 	</div>

                   
				    <div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Serie_Chasis</label>
				      <div class="col-lg-10">
				      	<input type="text" name="Serie_Chasis" class="form-control" id="Serie_Chasis" placeholder="Serie_Chasis..">
				      </div>
				 	</div>

					 <div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Anio</label>
				      <div class="col-lg-10">
				      	<input type="text" name="Anio" class="form-control" id="Anio" placeholder="Anio..">
				      </div>
				 	</div>

					 <div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">N_Disco</label>
				      <div class="col-lg-10">
				      	<input type="text" name="N_Disco" class="form-control" id="N_Disco" placeholder="N_Disco..">
				      </div>
				 	</div>

				<div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Marca</label>
				      <div class="col-lg-10">
				      	
					  <select class="form-control" name="Id_Marca" class="form-group">
                            @foreach($marc as $marca)
                                <option value="{{$marca->Id}}">
                                    {{$marca->Nombre}}
                                </option>
				    		  
				    	    @endforeach
                        </select>

				      </div>
				 	</div>
                     
				 	
				 	<div class="form-group">
				 		<div class="col-lg-10 col-lg-offset-2">
				 			<button type="submit" class="btn btn-primary">Submit</button>
				 			<a href="{{ url('/buses')}}" class="btn btn-primary">Back</a>
				 		</div>
				 	</div>
				  </fieldset>
				</form>
			</div>
		</div>
	</div>
    @endsection