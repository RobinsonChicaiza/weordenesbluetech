@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal" method="post" action="{{ url('/insertPr')}}">
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
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Region</label>
				      <div class="col-lg-10">
				      	
					  <select class="form-control" name="Id_Region" class="form-group">
                            @foreach($regi as $region)
                                <option value="{{$region->Id}}">
                                    {{$region->Nombre}}
                                </option>
				    		  
				    	    @endforeach
                        </select>

				      </div>
				 	</div>

                   
				    <div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Nombre</label>
				      <div class="col-lg-10">
				      	<input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre..">
				      </div>
				 	</div>
                     
				 	
				 	<div class="form-group">
				 		<div class="col-lg-10 col-lg-offset-2">
				 			<button type="submit" class="btn btn-primary">Submit</button>
				 			<a href="{{ url('/provincias')}}" class="btn btn-primary">Back</a>
				 		</div>
				 	</div>
				  </fieldset>
				</form>
			</div>
		</div>
	</div>
    @endsection