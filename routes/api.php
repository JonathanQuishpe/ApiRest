<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
return $request->user();
});*/
Route::resource('user', 'UsuariosController');
Route::resource('category', 'CategoriaController');
Route::resource('proveedor', 'ProveedorController');
Route::post('login', 'UsuariosController@login');
Route::post('contrato', 'ContratoController@guardar');
Route::get('proveedor-contrato/{id}', 'ProveedorController@proveedorContrato');
Route::get('listado-contrato/{id}', 'ContratoController@lista');
Route::get('calificar/{id}/{valor}', 'ContratoController@calificar');
Route::get('proveedor-estado/{id}', 'ContratoController@proveedor');
Route::get('cambiar-estado/{id}/{estado}', 'ContratoController@cambiarEstado');
Route::get('prueba/{id}', 'ContratoController@calcular');
Route::get('datos/{id}', 'UsuariosController@datos');
Route::post('userUpdate', 'UsuariosController@update');
