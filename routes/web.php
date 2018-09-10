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

//Rutas para el CRUD  de la tabla Cooperativas
Route::get('/cooperativas','CooperativasController@index');
Route::get('/agregarC', function(){
	return view('cooperativas.agregar');
});
Route::post('/insertC','CooperativasController@add');
Route::get('/actualizarC/{id}','CooperativasController@update');
Route::post('/editC/{id}','CooperativasController@edit');
Route::get('/borrarC/{id}','CooperativasController@delete');


Route::get('/departamentos','DepartamentosController@index');

Route::get('/agregar', function(){
	return view('departamentos.agregar');
});

Route::post('/insert','DepartamentosController@add');
Route::get('/actualizar/{id}','DepartamentosController@update');
Route::post('/edit/{id}','DepartamentosController@edit');
Route::get('/borrar/{id}','DepartamentosController@delete');

//Social
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


Route::get('/marcas','MarcaController@todoDepartamentos');