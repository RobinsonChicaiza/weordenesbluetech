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
Route::get('/borrarR/{id}','RolesController@delete');



//Rutas para el CRUD  de la tabla Buses
Route::get('/buses','BusesController@index');
Route::get('/agregarB', 'BusesController@agregar');
Route::post('/insertB','BusesController@add');
Route::get('/actualizarB/{id}','BusesController@update');
Route::post('/editB/{id}','BusesController@edit');
Route::get('/borrarB/{id}','BusesController@delete');



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