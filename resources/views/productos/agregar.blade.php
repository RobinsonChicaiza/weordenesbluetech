@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" width="100%">
                <div class="card-header">
					<h3>{{ __('Agregar productos') }}</h3>
                
                </div>

                <div class="card-body">
				<form class="form-horizontal" method="post" action="{{ url('/insertProd')}}">
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
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Impuesto</label>
				      <div class="col-md-6">
				      	
					  <select class="form-control" name="Id_Impuestos" class="form-group">
						<option selected="true" disabled="disabled">Seleccione el valor del impuesto</option>
                            @foreach($impuest as $impuesto)
                                <option value="{{$impuesto->Id}}">
                                    {{$impuesto->IVA}}
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
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Marca</label>
				      <div class="col-md-6">
				      	
					  <select class="form-control" name="Id_Marca" class="form-group">
						<option selected="true" disabled="disabled">Seleccione la marca</option>
                            @foreach($marc as $marca)
                                <option value="{{$marca->Id}}">
                                    {{$marca->Nombre}}
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
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Estado</label>
				      <div class="col-md-6">
				      	
					  <select class="form-control" name="Id_Estado" class="form-group">
						<option selected="true" disabled="disabled">Seleccione el estado</option>
                            @foreach($estad as $estado)
                                <option value="{{$estado->Id}}">
                                    {{$estado->Nombre}}
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
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Nombre</label>
				      <div class="col-md-6">
				      	<input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre..">
				      </div>
				 	</div>

                   
				    <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Precio</label>
				      <div class="col-md-6">
				      	<input type="text" onkeypress="return soloNumeros(event)" name="Precio" class="form-control" id="Precio" placeholder="Precio..">
				      </div>
				 	</div>


                     <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Precio Compra</label>
				      <div class="col-md-6">
				      	<input type="text" onkeypress="return soloNumeros(event)" name="PrecioCompra" class="form-control" id="PrecioCompra" placeholder="Precio Compra..">
				      </div>
				 	</div>

                     <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Stock</label>
				      <div class="col-md-6">
				      	<input type="text" onkeypress="return soloNumeros(event)" name="Stock" class="form-control" id="Stock" placeholder="Stock..">
				      </div>
				 	</div>

                     <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Descripcion</label>
				      <div class="col-md-6">
				      	<input type="text" name="Descripcion" class="form-control" id="Descripcion" placeholder="Descripcion..">
				      </div>
				 	</div>


				<div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Categoria</label>
				      <div class="col-md-6">
				      	
					  <select class="form-control" name="Id_Categoria" class="form-group">
						<option selected="true" disabled="disabled">Seleccione la categoria</option>
                            @foreach($categ as $categoria)
                                <option value="{{$categoria->Id}}">
                                    {{$categoria->Nombre}}
                                </option>
				    		  
				    	    @endforeach
                        </select>

				      </div>
							<div class="right">
                             
                             <a href="#" data-toggle="modal" data-target="#myModal1" style="float:right;">
                             <img src="{{ asset('imagenes/add.png') }}">
                             </a>
	      			</div>

				 	</div>
                     
				 	
				 	<div class="form-group row mb-0">
				 		<div class="col-md-6 offset-md-4">
				 			<button type="submit" class="btn btn-primary">Agregar</button>
				 			<a href="{{ url('/productos')}}" class="btn btn-primary">Atrás</a>
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