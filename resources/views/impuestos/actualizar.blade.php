@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" width="100%">
                <div class="card-header">
							<h3>{{ __('Actializar impuestos') }}<h3>
                
                </div>

          <div class="card-body">
				<form class="form-horizontal" method="POST" action="{{ url('/editIm',array($impuestos->Id)) }}">
					{{csrf_field()}}
				  
				    @if(count($errors) >0 )
				    	@foreach($errors->all() as $error)
				    		<div class="alert alert-danger">
				    			{{$error}}
				    		</div>
				    	@endforeach
				    @endif
						<script type="text/javascript" src="{{url('js/validaciones.js')}}"></script>
				    <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">IVA</label>
				      <div class="col-lg-10">
				      	<input type="text" onkeypress="return numeros(event)" name="IVA" class="form-control" id="IVA" placeholder="Impuestos" value="<?php echo $impuestos->IVA; ?>">
				      </div>
				 	</div>

				 	<div class="form-group row mb-0">
				 		<div class="col-md-6 offset-md-4">
				 			<button type="submit" class="btn btn-primary">Actualizar</button>

				 			<a href="{{ url('/impuestos')}}" class="btn btn-primary">Atrás</a>
				 		</div>
				 	</div>
				 
				</form>
				</div>
		</div>
	</div>
	</div>
	</div>
    @endsection