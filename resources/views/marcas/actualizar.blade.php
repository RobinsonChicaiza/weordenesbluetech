@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" width="100%">
                <div class="card-header">
					<h3>{{ __('Actializar marca') }}<h3>
                
                </div>

                <div class="card-body">

				<form class="form-horizontal" method="POST" action="{{ url('/editMa',array($marcas->Id)) }}">
					{{csrf_field()}}
				  <fieldset>
				    <legend class="text-center">Actualizar Marca</legend>
				    @if(count($errors) >0 )
				    	@foreach($errors->all() as $error)
				    		<div class="alert alert-danger">
				    			{{$error}}
				    		</div>
				    	@endforeach
				    @endif
					<div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Tipos Marca</label>
				      <div class="col-md-6">
				      	
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

				    <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Nombre</label>
				      <div class="col-md-6">
				      	<input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Marca" value="<?php echo $marcas->Nombre; ?>">
				      </div>
				 	</div>
				 	

				 	<div class="form-group row mb-0">
				 		<div class="col-md-6 offset-md-4">
				 			<button type="submit" class="btn btn-primary">Actualizar</button>

				 			<a href="{{ url('/marcas')}}" class="btn btn-primary">Atrás</a>
				 		</div>
				 	</div>
				  </fieldset>
				</form>
			</div>
		</div>
	</div>
    @endsection