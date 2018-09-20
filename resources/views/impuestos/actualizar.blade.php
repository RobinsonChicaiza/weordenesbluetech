@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal" method="POST" action="{{ url('/editIm',array($impuestos->Id)) }}">
					{{csrf_field()}}
				  <fieldset>
				    <legend class="text-center">Actualizar Impuestos</legend>
				    @if(count($errors) >0 )
				    	@foreach($errors->all() as $error)
				    		<div class="alert alert-danger">
				    			{{$error}}
				    		</div>
				    	@endforeach
				    @endif
				    <div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">IVA</label>
				      <div class="col-lg-10">
				      	<input type="text" name="IVA" class="form-control" id="IVA" placeholder="Impuestos" value="<?php echo $impuestos->IVA; ?>">
				      </div>
				 	</div>

				 	<div class="form-group">
				 		<div class="col-lg-10 col-lg-offset-2">
				 			<button type="submit" class="btn btn-primary">Actualizar</button>

				 			<a href="{{ url('/impuestos')}}" class="btn btn-primary">Atrás</a>
				 		</div>
				 	</div>
				  </fieldset>
				</form>
			</div>
		</div>
	</div>
    @endsection