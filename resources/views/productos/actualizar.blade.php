@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" width="100%">
                <div class="card-header">
				<h3>{{ __('Actializar productos') }}</h3>
                
                </div>

                <div class="card-body">
				<form class="form-horizontal" method="POST" action="{{ url('/editProd',array($productos->Id)) }}">
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
				      	
					  <select class="form-control" name="Id_Impuestos" class="form-group row">
                            
					  @foreach($impuestosAll as $impuestoAll)

					   @if( $impuestoAll -> Id == $impuesto -> Id )
					   <option selected="true" value="{{ $impuestoAll->Id }}">
                                    {{$impuestoAll->IVA}}
                                </option>
				    	@else
                                <option value="{{ $impuestoAll->Id }}">
                                    {{$impuestoAll->IVA}}
                                </option>
								@endif		
				    		  
				    	    @endforeach
			
                        </select>
				      </div>
				 	</div>


                     <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Marca</label>
				      <div class="col-md-6">
				      	
					  <select class="form-control" name="Id_Marca" class="form-group row">
                            
					  @foreach($marcasAll as $marcaAll)

					   @if( $marcaAll -> Id == $marca -> Id )
					   <option selected="true" value="{{ $marcaAll->Id }}">
                                    {{$marcaAll->Nombre}}
                                </option>
				    	@else
                                <option value="{{ $marcaAll->Id }}">
                                    {{$marcaAll->Nombre}}
                                </option>
								@endif		
				    		  
				    	    @endforeach
			
                        </select>
				      </div>
				 	</div>

                     <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Estado</label>
				      <div class="col-md-6">
				      	
					  <select class="form-control" name="Id_Estado" class="form-group row">
                            
					  @foreach($estadosAll as $estadoAll)

					   @if( $estadoAll -> Id == $estado -> Id )
					   <option selected="true" value="{{ $estadoAll->Id }}">
                                    {{$estadoAll->Nombre}}
                                </option>
				    	@else
                                <option value="{{ $estadoAll->Id }}">
                                    {{$estadoAll->Nombre}}
                                </option>
								@endif		
				    		  
				    	    @endforeach
			
                        </select>
				      </div>
				 	</div>


                    <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Nombre</label>
				      <div class="col-md-6">
				      	<input type="text" onkeypress="return soloNumeros(event)" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre" value="<?php echo $productos->Nombre; ?>">
				      </div>
				 	</div>

				    <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Precio</label>
				      <div class="col-md-6">
				      	<input type="text" name="Precio" class="form-control" id="Precio" placeholder="Precio" value="<?php echo $productos->Precio; ?>">
				      </div>
				 	</div>
				 	<div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">PrecioCompra</label>
				      <div class="col-md-6">
					  <input type="text" onkeypress="return soloNumeros(event)" name="PrecioCompra" class="form-control" id="PrecioCompra" placeholder="PrecioCompra" value="<?php echo $productos->PrecioCompra; ?>">
	
				      	</textarea>
				      </div>
				 	</div>

					<div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Stock</label>
				      <div class="col-md-6">
				      	<input type="text" onkeypress="return soloNumeros(event)" name="Stock" class="form-control" id="Stock" placeholder="Stock" value="<?php echo $productos->Stock; ?>">
				      </div>
				 	</div>


                     <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Descripcion</label>
				      <div class="col-md-6">
				      	<input type="text" onkeypress="return soloNumeros(event)" name="Descripcion" class="form-control" id="Descripcion" placeholder="Descripcion" value="<?php echo $productos->Descripcion; ?>">
				      </div>
				 	</div>


                     <div class="form-group row">
				      <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-right">Categoria</label>
				      <div class="col-md-6">
				      	
					  <select class="form-control" name="Id_Categoria" class="form-group row">
                            
					  @foreach($categoriasAll as $categoriaAll)

					   @if( $categoriaAll -> Id == $categoria -> Id )
					   <option selected="true" value="{{ $categoriaAll->Id }}">
                                    {{$categoriaAll->Nombre}}
                                </option>
				    	@else
                                <option value="{{ $categoriaAll->Id }}">
                                    {{$categoriaAll->Nombre}}
                                </option>
								@endif		
				    		  
				    	    @endforeach
			
                        </select>
				      </div>
				 	</div>

				 	<div class="form-group row mb-0">
				 		<div class="col-md-6 offset-md-4">
				 			<button type="submit" class="btn btn-primary">Actualizar</button>

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