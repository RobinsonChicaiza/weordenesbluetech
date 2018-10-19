<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Ruta para ir al perfil
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/perfil/{id}', 'PerfilController@index');

//Espacio LIBRE. ROBIN
Route::get('/passEnc/{id}','EncripPassController@encripPass');
Route::get('/passVer/{pas}/{id}','EncripPassController@validaPass');
Route::get('/actualizarUsuario/{id}','ActualizacionRegistroController@update');
Route::post('/editUsu/{id}','ActualizacionRegistroController@edit');
Route::get('/vistaReferencia/{id}','ReferenciaController@vistaAgregar');
Route::post('/agregarReferencia/{id}','ReferenciaController@add');
Route::get('/delereReferencia/{id_persona}/{id_referencia}/{aux}','ReferenciaController@delete');
Route::get('/updateReferencia/{id}','ReferenciaController@update');
Route::post('/buscarPersona/{id}','ReferenciaController@buscarCedula');

// Ruta para agregar usuario por google
//Route::get('/registroUsuarioSocial', 'LoginController@mostrarRegistro');
//Route::get('/registroUsuarioSocial','LoginController@encripPass');
Route::resource('/ordenes','OrdenController');


//Rutas para el CRUD  de la tabla Cooperativas
Route::get('/cooperativas','CooperativasController@index');
Route::get('/agregarC', function(){
	return view('cooperativas.agregar');
});
Route::post('/insertC','CooperativasController@add');
Route::get('/actualizarC/{id}','CooperativasController@update');
Route::post('/editC/{id}','CooperativasController@edit');
Route::get('/borrarC/{id}','CooperativasController@delete');

//Rutas para el CRUD  de la tabla Departamentos
Route::get('/departamentos','DepartamentosController@index');

Route::get('/agregarD', function(){
	return view('departamentos.agregar');
});

Route::post('/insertD','DepartamentosController@add');
Route::get('/actualizarD/{id}','DepartamentosController@update');
Route::post('/editD/{id}','DepartamentosController@edit');
Route::get('/borrarD/{id}','DepartamentosController@delete');

//Social
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


Route::get('/marcas','MarcaController@todoDepartamentos');

//Rutas para el CRUD  de la tabla Tipos Marcas
Route::get('/tiposmarcas','TiposmarcasController@index');

Route::get('/agregarT', function(){
	return view('tiposmarcas.agregar');
});

Route::post('/insertT','TiposmarcasController@add');
Route::get('/actualizarT/{id}','TiposmarcasController@update');
Route::post('/editT/{id}','TiposmarcasController@edit');
Route::get('/borrarT/{id}','TiposmarcasController@delete');


//Rutas para el CRUD  de la tabla Roles
Route::get('/roles','RolesController@index');

Route::get('/agregarR', 'RolesController@agregar');
Route::post('/insertR','RolesController@add');
Route::get('/actualizarR/{id}','RolesController@update');
Route::post('/editR/{id}','RolesController@edit');
Route::post('/insertarRolDepartamento','RolesController@addDepartamento');



//Rutas para el CRUD  de la tabla Buses
Route::get('/buses','BusesController@index');
Route::get('/agregarB', 'BusesController@agregar');
Route::post('/insertB','BusesController@add');
Route::get('/actualizarB/{id}','BusesController@update');
Route::post('/editB/{id}','BusesController@edit');
Route::get('/borrarB/{id}','BusesController@delete');
Route::post('/insertarCooperativaBus','BusesController@addCooperativaBus');
Route::post('/insertarMarca','BusesController@addMarcaBus');



//Rutas para el CRUD  de la tabla Regiones
Route::get('/regiones','RegionesController@index');

Route::get('/agregarRe', function(){
	return view('regiones.agregar');
});

Route::post('/insertRe','RegionesController@add');
Route::get('/actualizarRe/{id}','RegionesController@update');
Route::post('/editRe/{id}','RegionesController@edit');
Route::get('/borrarRe/{id}','RegionesController@delete');


//Rutas para el CRUD  de la tabla Provincias
Route::get('/provincias','ProvinciasController@index');

Route::get('/agregarPr', 'ProvinciasController@agregar');
Route::post('/insertPr','ProvinciasController@add');
Route::get('/actualizarPr/{id}','ProvinciasController@update');
Route::post('/editPr/{id}','ProvinciasController@edit');
Route::get('/borrarPr/{id}','ProvinciasController@delete');


//Rutas para el CRUD  de la tabla Cantones
Route::get('/cantones','CantonesController@index');

Route::get('/agregarCa', 'CantonesController@agregar');
Route::post('/insertCa','CantonesController@add');
Route::get('/actualizarCa/{id}','CantonesController@update');
Route::post('/editCa/{id}','CantonesController@edit');
Route::get('/borrarCa/{id}','CantonesController@delete');

//Rutas para el CRUD  de la tabla Marcas
Route::get('/marcas','MarcasController@index');

Route::get('/agregarMa', 'MarcasController@agregar');
Route::post('/insertMa','MarcasController@add');
Route::get('/actualizarMa/{id}','MarcasController@update');
Route::post('/editMa/{id}','MarcasController@edit');
Route::get('/borrarMa/{id}','MarcasController@delete');
Route::post('/insertarTipoMarcas','MarcasController@addTipoMarcas');

//Rutas para el CRUD  de la tabla Impuestos
Route::get('/impuestos','ImpuestosController@index');

Route::get('/agregarIm', function(){
	return view('impuestos.agregar');
});

Route::post('/insertIm','ImpuestosController@add');
Route::get('/actualizarIm/{id}','ImpuestosController@update');
Route::post('/editIm/{id}','ImpuestosController@edit');
Route::get('/borrarIm/{id}','ImpuestosController@delete');


//Rutas para el CRUD  de la tabla RegistroBuses
Route::get('/registrobuses','RegistroBusesController@index');
Route::get('/agregarRb', 'RegistroBusesController@agregar');
Route::post('/insertRb','RegistroBusesController@add');
Route::get('/actualizarRb/{id}','RegistroBusesController@update');
Route::post('/editRb/{id}','RegistroBusesController@edit');
Route::get('/borrarRb/{id}','RegistroBusesController@delete');


//Rutas para el CRUD  de la tabla RegistroCategorias
Route::get('/categorias','CategoriasController@index');
Route::get('/agregarCat', 'CategoriasController@agregar');
Route::post('/insertCat','CategoriasController@add');
Route::get('/actualizarCat/{id}','CategoriasController@update');
Route::post('/editCat/{id}','CategoriasController@edit');
Route::get('/borrarCat/{id}','CategoriasController@delete');

//Rutas para el CRUD  de la tabla Estados
Route::get('/estados','EstadosController@index');

Route::get('/agregarEst', function(){
	return view('estados.agregar');
});

Route::post('/insertEst','EstadosController@add');
Route::get('/actualizarEst/{id}','EstadosController@update');
Route::post('/editEst/{id}','EstadosController@edit');
Route::get('/borrarEst/{id}','EstadosController@delete');


//Rutas para el CRUD  de la tabla Productos
Route::get('/productos','ProductosController@index');

Route::get('/agregarProd', 'ProductosController@agregar');
Route::post('/insertProd','ProductosController@add');
Route::get('/actualizarProd/{id}','ProductosController@update');
Route::post('/editProd/{id}','ProductosController@edit');
Route::get('/borrarProd/{id}','ProductosController@delete');
Route::post('/insertarProdImpuesto','ProductosController@addImpuestoProducto');
Route::post('/insertarProdMarca','ProductosController@addMarcaProducto');
Route::post('/insertarProdEstado','ProductosController@addEstadoProducto');
Route::post('/insertarProdCategoria','ProductosController@addCategoriaProducto');