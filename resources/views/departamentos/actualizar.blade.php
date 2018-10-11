@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
			<div class="card" width="100%">

								<div class="card-header">{{ __('Actializar Departamentos') }}
                
                </div>

								<div class="card-body">

				<form class="form-horizontal" method="POST" action="{{ url('/editD',array($departamentos->Id)) }}">
					{{csrf_field()}}
				  <fieldset>
				    <legend class="text-center">Actualizar Departamento</legend>
				    @if(count($errors) >0 )
				    	@foreach($errors->all() as $error)
				    		<div class="alert alert-danger">
				    			{{$error}}
				    		</div>
				    	@endforeach
				    @endif
						<script type="text/javascript" src="{{url('js/validaciones.js')}}"></script>
				    <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Nombre</label>
				      <div class="col-md-6">
				      	<input type="text" onkeypress="return soloLetras(event)" name="Nombre" class="form-control" id="Nombre" placeholder="Departamentos" value="<?php echo $departamentos->Nombre; ?>">
				      </div>
				 	</div>

				 	<div class="form-group row mb-0">
				 		<div class="col-md-6 offset-md-4">
				 			<button type="submit" class="btn btn-primary">Actualizar</button>

				 			<a href="{{ url('/departamentos')}}" class="btn btn-primary">Atrás</a>
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