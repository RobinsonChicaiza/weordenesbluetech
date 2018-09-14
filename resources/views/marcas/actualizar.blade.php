@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal" method="POST" action="{{ url('/editMa',array($marcas->Id)) }}">
					{{csrf_field()}}
				  <fieldset>
				    <legend>Actualizar Marca</legend>
				    @if(count($errors) >0 )
				    	@foreach($errors->all() as $error)
				    		<div class="alert alert-danger">
				    			{{$error}}
				    		</div>
				    	@endforeach
				    @endif
					<div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Tipos Marca</label>
				      <div class="col-lg-10">
				      	
					  <select class="form-control" name="Id_Tipo" class="form-group">
                            
					  @foreach($tiposmarcasAll as $tiposmarcasAll)

					   @if( $tiposmarcasAll -> Id == $tiposmarcas -> Id )
					   <option selected="true" value="{{ $tiposmarcasAll->Id }}">
                                    {{$tiposmarcasAll->Nombre}}
                                </option>
				    	@else
                                <option value="{{ $tiposmarcasAll->Id }}">
                                    {{$tiposmarcasAll->Nombre}}
                                </option>
								@endif		
				    		  
				    	    @endforeach
				    		  
				    	   
                        </select>

				      </div>
				 	</div>

				    <div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Nombre</label>
				      <div class="col-lg-10">
				      	<input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Marca" value="<?php echo $marcas->Nombre; ?>">
				      </div>
				 	</div>
				 	

				 	<div class="form-group">
				 		<div class="col-lg-10 col-lg-offset-2">
				 			<button type="submit" class="btn btn-primary">Actualizar</button>

				 			<a href="{{ url('/marcas')}}" class="btn btn-primary">Atras</a>
				 		</div>
				 	</div>
				  </fieldset>
				</form>
			</div>
		</div>
	</div>
    @endsection