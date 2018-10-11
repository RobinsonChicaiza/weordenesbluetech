@extends('layouts.app')

@section('content')
<div class="container">

		<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" width="100%">
                <div class="card-header"><h3>{{ __('Actualizar roles') }}</h3>
                
                </div>

          <div class="card-body">
				<form class="form-horizontal" method="post" action="{{ url('/insertR')}}">
						@csrf

							@if(count($errors) >0 )
								@foreach($errors->all() as $error)
									<div class="alert alert-danger">
										{{$error}}
									</div>
								@endforeach
							@endif                   


					<div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Departamento </label>
				      <div class="col-md-6">
				      	
					  <select class="form-control" name="Id_Departamento" class="form-group">
					  <option selected="true" disabled="disabled">Seleccione el departamento</option>
                            @foreach($departament as $departamento)
                                <option value="{{ $departamento->Id }}">
                                    {{$departamento->Nombre}}
                                </option>
				    		  
				    	    @endforeach
                        </select>
										


							</div>
							<div class="right">
                             
                             <a href="#" data-toggle="modal" data-target="#myModal" style="float:right;">
                             <img src="{{ asset('imagenes/busc.png') }}">
                             </a>
	      			</div>
				 	</div>


				    <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Nombre</label>
				      <div class="col-md-6">
				      	<input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre..">
				      </div>
				 	</div>

					<div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Sueldo</label>
							<div class="col-md-6">
				      	<input type="text" name="Sueldo" class="form-control" id="Sueldo" placeholder="Sueldo..">
				      </div>
				 	</div>
                     
				 	
				 	<div class="form-group row mb-0">
					 <div class="col-md-6 offset-md-4">
				 			<button type="submit" class="btn btn-primary">Guardar</button>
				 			<a href="{{ url('/roles')}}" class="btn btn-primary">Atrás</a>
				 		</div>
				 	</div>
				  </fieldset>
					</form>
			</div>
		</div>
	</div>

	<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">       
        <h4 id="myModalLabel">Buscar persona por cédula</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="{{ url('/insertarRolDepartamento') }}" method="post">
      		{{csrf_field()}}
	      <div class="modal-body">
				<input type="text" onkeypress="return soloLetras(event)" name="Nombre" class="form-control" id="Nombre" value="{{ old('Nombre') }}" placeholder="Departamento.." required>
				
	      <div class="modal-footer">
	        <button type="button"  class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        <button type="submit" class="btn btn-primary">Buscar</button>
	      </div>
      </form>
    </div>
  </div>
</div>
<!-- fin modal -->
    @endsection