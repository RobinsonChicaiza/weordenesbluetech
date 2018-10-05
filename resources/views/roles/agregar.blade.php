@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal" method="post" action="{{ url('/insertR')}}">
					{{csrf_field()}}
				  <fieldset>
				    <legend class="text-center">Agregar Roles</legend>
				    @if(count($errors) >0 )
				    	@foreach($errors->all() as $error)
				    		<div class="alert alert-danger">
				    			{{$error}}
				    		</div>
				    	@endforeach
				    @endif                   


					<div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Departamento</label>
				      <div class="col-lg-10">
				      	
					  <select class="form-control" name="Id_Departamento" class="form-group">
					  <option selected="true" disabled="disabled">Seleccione el departamento</option>
                            @foreach($departament as $departamento)
                                <option value="{{ $departamento->Id }}">
                                    {{$departamento->Nombre}}
                                </option>
				    		  
				    	    @endforeach
                        </select>
												<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

				</form>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  +
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<legend class="text-center" id="myModalLabel">Agregar Departamento</legend>
      </div>
      <div class="modal-body">
        
	  <div class="container">
		<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal" method="post" action="{{ url('/insertarRD')}}">
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
				    <div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Nombre</label>
				      <div class="col-lg-10">
				      	<input type="text" onkeypress="return soloLetras(event)" name="Nombre" class="form-control" id="Nombre" placeholder="Departamento..">
				      </div>
				 	</div>

					 <div class="text-center" id="myModalLabel" class="form-group" class="col-lg-10 col-lg-offset-2">
       	 <div class="modal-footer">
            <button  class="btn btn-warning" type="submit" id="add">
              <span  class="glyphicon glyphicon-plus">Guardar Post</span>
            </button>
            <button class="btn btn-warning" type="button" data-dismiss="modal">
              <span class="glyphicon glyphicon-remobe">Salir</span>
            </button>
          </div>
     		 </div>
				 	
				 	
				  </fieldset>
				</form>
			</div>
		</div>
	</div>


		
      </div>
      
    </div>
  </div>
</div>



				      </div>
				 	</div>


				    <div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Nombre</label>
				      <div class="col-lg-10">
				      	<input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre..">
				      </div>
				 	</div>

					 <div class="form-group">
				      <label for="exampleInputEmail1" class="col-lg-2 control-label">Sueldo</label>
				      <div class="col-lg-10">
				      	<input type="text" name="Sueldo" class="form-control" id="Sueldo" placeholder="Sueldo..">
				      </div>
				 	</div>
                     
				 	
				 	<div class="form-group">
				 		<div class="col-lg-10 col-lg-offset-2">
				 			<button type="submit" class="btn btn-primary">Guardar</button>
				 			<a href="{{ url('/roles')}}" class="btn btn-primary">Atrás</a>
				 		</div>
				 	</div>
				  </fieldset>
				
			</div>
		</div>
	</div>
    @endsection