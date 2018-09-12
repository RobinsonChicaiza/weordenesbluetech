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


Route::get('/borrarR/{id}','RolesController@delete');



//Rutas para el CRUD  de la tabla Buses
Route::get('/buses','BusesController@index');
