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
Route::post('administracion/login', 'AdministracionController@login');
Route::post('contrato', 'ContratoController@guardar');
Route::get('proveedor-contrato/{id}', 'ProveedorController@proveedorContrato');
Route::get('lista', 'ProveedorController@lista');
Route::get('listado-contrato/{id}', 'ContratoController@lista');
Route::get('calificar/{id}/{valor}', 'ContratoController@calificar');
Route::get('proveedor-estado/{id}', 'ContratoController@proveedor');
Route::get('cambiar-estado/{id}/{estado}', 'ContratoController@cambiarEstado');
Route::get('prueba/{id}', 'ContratoController@calcular');
Route::get('datos/{id}', 'UsuariosController@datos');
Route::get('datos-proveedor/{id}', 'ProveedorController@datos');
Route::post('userUpdate', 'UsuariosController@update');
Route::post('proveedorUpdate', 'ProveedorController@actualizar');
Route::post('proveedor/guardar', 'ProveedorController@guardar');
Route::post('categoria/guardar', 'CategoriaController@guardar');
Route::get('categoria/borrar/{id}', 'CategoriaController@borrar');
Route::get('proveedor/borrar/{id}', 'ProveedorController@borrar');
Route::get('proveedor/activar/{id}', 'ProveedorController@activar');
Route::get('usuario/cuentas', 'UsuariosController@cuenta');
Route::get('usuario/cuentas-asignar', 'UsuariosController@cuentaLibres');
Route::get('cuentas', 'ProveedorController@proveedorDisponible');
Route::get('cuentas/asignar/{id}/{pro}', 'UsuariosController@asignar');
