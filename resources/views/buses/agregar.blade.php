@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" width="100%">
                <div class="card-header">
					<h3>{{ __('Agregar buses') }}</h3>
                
                </div>

                <div class="card-body">
				<form class="form-horizontal" method="post" action="{{ url('/insertB')}}">
					{{csrf_field()}}
				  <fieldset>
				    
				    @if(count($errors) >0 )
				    	@foreach($errors->all() as $error)
				    		<div class="alert alert-danger">
				    			{{$error}}
				    		</div>
				    	@endforeach
				    @endif
					<script type="text/javascript" src="{{url('js/validaciones.js')}}"></script>


                   


					<div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Cooperativa</label>
				      <div class="col-md-6">
				      	
					  <select class="form-control" name="Id_Cooperativa" class="form-group">
                            @foreach($cooperativ as $cooperativa)
                                <option value="{{$cooperativa->Id}}">
                                    {{$cooperativa->Nombre}}
                                </option>
				    		  
				    	    @endforeach
                        </select>

				      </div>
					  <div class="right">
                             
                             <a href="#" data-toggle="modal" data-target="#myModal" style="float:right;">
                             <img src="{{ asset('imagenes/add.png') }}">
                             </a>
	      			</div>
				 	</div>

					 <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Placa</label>
				      <div class="col-md-6">
				      	<input type="text" name="Placa" class="form-control" id="Placa" placeholder="Placa..">
				      </div>
				 	</div>

                   
				    <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Serie_Chasis</label>
				      <div class="col-md-6">
				      	<input type="text" onkeypress="return soloNumeros(event)" name="Serie_Chasis" class="form-control" id="Serie_Chasis" placeholder="Serie_Chasis..">
				      </div>
				 	</div>

					 <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Anio</label>
				      <div class="col-md-6">
				      	<input type="text" onkeypress="return soloNumeros(event)" name="Anio" class="form-control" id="Anio" placeholder="Anio..">
				      </div>
				 	</div>

					 <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">N_Disco</label>
				      <div class="col-md-6">
				      	<input type="text" onkeypress="return soloNumeros(event)" name="N_Disco" class="form-control" id="N_Disco" placeholder="N_Disco..">
				      </div>
				 	</div>

				<div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Marca</label>
				      <div class="col-md-6">
				      	
					  <select class="form-control" name="Id_Marca" class="form-group">
                            @foreach($marc as $marca)
                                <option value="{{$marca->Id}}">
                                    {{$marca->Nombre}}
                                </option>
				    		  
				    	    @endforeach
                        </select>

				      </div>
				 	</div>
                     
				 	
				 	<div class="form-group row mb-0">
				 		<div class="col-md-6 offset-md-4">
				 			<button type="submit" class="btn btn-primary">Agregar</button>
				 			<a href="{{ url('/buses')}}" class="btn btn-primary">Atrás</a>
				 		</div>
				 	</div>
				  </fieldset>
				</form>
				</div>
				</div>
			</div>
		</div>
	</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">       
        <h4 id="myModalLabel">Agregar tipo cooperativa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="{{ url('/insertarCooperativaBus') }}" method="post">
      		{{csrf_field()}}
	      <div class="modal-body">
				<input type="text" onkeypress="return soloLetras(event)" name="Nombre" class="form-control" id="Nombre" value="{{ old('Nombre') }}" placeholder="Cooperativa.." required>
				
	      <div class="modal-footer">
	        <button type="button"  class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        <button type="submit" class="btn btn-primary">Guardar</button>
	      </div>
      </form>
    </div>
  </div>
</div>
<!-- fin modal -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">       
        <h4 id="myModalLabel">Agregar tipo marca</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="{{ url('/insertarMarca') }}" method="post">
      		{{csrf_field()}}
	      <div class="modal-body">
				
				


				
	      <div class="modal-footer">
	        <button type="button"  class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        <button type="submit" class="btn btn-primary">Guardar</button>
	      </div>
      </form>
    </div>
  </div>
</div>
<!-- fin modal -->

    @endsection