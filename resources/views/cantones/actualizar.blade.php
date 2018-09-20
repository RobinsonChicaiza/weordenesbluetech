@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal" method="POST" action="{{ url('/editCa',array($cantones->Id)) }}">
					{{csrf_field()}}
				  <fieldset>
				    <legend class="text-center">Actualizar Cantones</legend>
				    @if(count($errors) >0 )
				    	@foreach($errors->all() as $error)
				    		<div class="alert alert-danger">
				    			{{$error}}
				    		</div>
				    	@endforeach
				    @endif
					<div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Provincia</label>
				      <div class="col-lg-10">
				      	
					  <select class="form-control" name="Id_Provincia" class="form-group">
                            
					  @foreach($provinciasAll as $provinciaAll)

					   @if( $provinciaAll -> Id == $provincia -> Id )
					   <option selected="true" value="{{ $provinciaAll->Id }}">
                                    {{$provinciaAll->Nombre}}
                                </option>
				    	@else
                                <option value="{{ $provinciaAll->Id }}">
                                    {{$provinciaAll->Nombre}}
                                </option>
								@endif		
				    		  
				    	    @endforeach
				    		  
				    	   
                        </select>

				      </div>
				 	</div>

				    <div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Nombre</label>
				      <div class="col-lg-10">
				      	<input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Cantones" value="<?php echo $cantones->Nombre; ?>">
				      </div>
				 	</div>
				 	

				 	<div class="form-group">
				 		<div class="col-lg-10 col-lg-offset-2">
				 			<button type="submit" class="btn btn-primary">Actualizar</button>

				 			<a href="{{ url('/cantones')}}" class="btn btn-primary">Atrás</a>
				 		</div>
				 	</div>
				  </fieldset>
				</form>
			</div>
		</div>
	</div>
    @endsection