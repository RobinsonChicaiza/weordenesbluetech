@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal" method="POST" action="{{ url('/editPr',array($provincias->Id)) }}">
					{{csrf_field()}}
				  <fieldset>
				    <legend>Actualizar Provincias</legend>
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
                            
					  @foreach($regionesAll as $regionAll)

					   @if( $regionAll -> Id == $region -> Id )
					   <option selected="true" value="{{ $regionAll->Id }}">
                                    {{$regionAll->Nombre}}
                                </option>
				    	@else
                                <option value="{{ $regionAll->Id }}">
                                    {{$regionAll->Nombre}}
                                </option>
								@endif		
				    		  
				    	    @endforeach
				    		  
				    	   
                        </select>

				      </div>
				 	</div>

				    <div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Nombre</label>
				      <div class="col-lg-10">
				      	<input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Provincias" value="<?php echo $provincias->Nombre; ?>">
				      </div>
				 	</div>
				 	

				 	<div class="form-group">
				 		<div class="col-lg-10 col-lg-offset-2">
				 			<button type="submit" class="btn btn-primary">Actualizar</button>

				 			<a href="{{ url('/provincias')}}" class="btn btn-primary">Atras</a>
				 		</div>
				 	</div>
				  </fieldset>
				</form>
			</div>
		</div>
	</div>
    @endsection