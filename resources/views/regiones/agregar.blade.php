@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal" method="post" action="{{ url('/insertRe')}}">
					{{csrf_field()}}
				  <fieldset>
				    <legend class="text-center">Agregar Regiones</legend>
				    @if(count($errors) >0 )
				    	@foreach($errors->all() as $error)
				    		<div class="alert alert-danger">
				    			{{$error}}
				    		</div>
				    	@endforeach
				    @endif
				    <div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Nombre</label>
				      <div class="col-lg-10">
							<script type="text/javascript" src="{{url('js/validaciones.js')}}"></script>
				      	<input type="text" onkeypress="return soloLetras(event)"  name="Nombre" class="form-control" id="Nombre" placeholder="Regiones..">
				      </div>
				 	</div>
				 	
				 	<div class="form-group">
				 		<div class="col-lg-10 col-lg-offset-2">
				 			<button type="submit" class="btn btn-primary">Guardar</button>
				 			<a href="{{ url('/regiones')}}" class="btn btn-primary">Atrás</a>
				 		</div>
				 	</div>
				  </fieldset>
				</form>
			</div>
		</div>
	</div>
    @endsection