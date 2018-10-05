@extends('layouts.app')

@section('content')
<div class="container" >
		<div class="row" style="float:center;">
			<div class="col-md-6">
				<form class="form-horizontal" method="POST" action="{{ url('/editC',array($cooperativas->Id)) }}">
					{{csrf_field()}}
				  <fieldset>				    
					<h1>Actualizar Cooperativa</h1>
					<br />
				    @if(count($errors) >0 )
				    	@foreach($errors->all() as $error)
				    		<div class="alert alert-danger">
				    			{{$error}}
				    		</div>
				    	@endforeach
				    @endif
					<script type="text/javascript" src="{{url('js/validaciones.js')}}"></script>
				    <div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Nombre</label>
				      <div class="col-lg-10">
				      	<input type="text" onkeypress="return soloLetras(event)" name="Nombre" class="form-control" id="Nombre" placeholder="Cooperativa" value="<?php echo $cooperativas->Nombre; ?>">
				      </div>
				 	</div>
				 	<div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Ruc</label>
				      <div class="col-lg-10">
					  <input type="text" onkeypress="return soloNumeros(event)" name="Ruc" class="form-control" id="Ruc" placeholder="Ruc" value="<?php echo $cooperativas->Ruc; ?>">
				      	
				      		
				      	</textarea>
				      </div>
				 	</div>

				 	<div class="form-group">
				 		<div class="col-lg-10 col-lg-offset-2">
				 			<button type="submit" class="btn btn-primary">Actualizar</button>

				 			<a href="{{ url('/cooperativas')}}" class="btn btn-primary">Atrás</a>
				 		</div>
				 	</div>
				  </fieldset>
				</form>
			</div>
		</div>
	</div>
    @endsection