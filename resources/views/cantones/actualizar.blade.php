@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" width="100%">
                <div class="card-header">
				<h3>{{ __('Actializar caregorias') }}</h3>
                
                </div>

                <div class="card-body">
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
					<div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Provincia</label>
				      <div class="col-md-6">
				      	
					  <select class="form-control" name="Id_Provincia" class="form-group row">
                            
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

				    <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Nombre</label>
				      <div class="col-md-6">
				      	<input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Cantones" value="<?php echo $cantones->Nombre; ?>">
				      </div>
				 	</div>
				 	

				 	<div class="form-group row mb-0">
				 		<div class="col-md-6 offset-md-4">
				 			<button type="submit" class="btn btn-primary">Actualizar</button>

				 			<a href="{{ url('/cantones')}}" class="btn btn-primary">Atrás</a>
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