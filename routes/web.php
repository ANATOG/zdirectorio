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

Route::get('/panel', function () {
    return view('contenido/contenido');
});

Route::get('/', function () {
    return view('home/homeprincipal');
});

Route::get('/categoria', 'CategoriaController@index');
Route::post('/categoria/registrar', 'CategoriaController@store');
Route::put('/categoria/actualizar', 'CategoriaController@update');
Route::put('/categoria/desactivar', 'CategoriaController@desactivar');
Route::put('/categoria/activar', 'CategoriaController@activar');
Route::get('/categoria/selectCategoria', 'CategoriaController@selectCategoria');


Route::get('/departamento', 'DepartamentoController@index');
Route::post('/departamento/registrar', 'DepartamentoController@store');
Route::put('/departamento/actualizar', 'DepartamentoController@update');
Route::put('/departamento/desactivar', 'DepartamentoController@desactivar');
Route::put('/departamento/activar', 'DepartamentoController@activar');
Route::get('/departamento/selectDepartamento', 'DepartamentoController@selectDepartamento');


Route::get('/municipio', 'MunicipioController@index');
Route::post('/municipio/registrar', 'MunicipioController@store');
Route::put('/municipio/actualizar', 'MunicipioController@update');
Route::put('/municipio/desactivar', 'MunicipioController@desactivar');
Route::put('/municipio/activar', 'MunicipioController@activar');
Route::put('/municipio/selectDepartamento', 'MunicipioController@selectDepartamento');


Route::get('/red', 'RedController@index');
Route::post('/red/registrar', 'RedController@store');
Route::put('/red/actualizar', 'RedController@update');
Route::put('/red/desactivar', 'RedController@desactivar');
Route::put('/red/activar', 'RedController@activar');
Route::put('/red/selectDepartamento', 'RedController@selectDepartamento');


Route::get('/tipo', 'TipoController@index');
Route::post('/tipo/registrar', 'TipoController@store');
Route::put('/tipo/actualizar', 'TipoController@update');
Route::put('/tipo/desactivar', 'TipoController@desactivar');
Route::put('/tipo/activar', 'TipoController@activar');
Route::put('/tipo/selectTipo', 'TipoController@selectDepartamento');


Route::get('/persona', 'PersonaController@index');
Route::post('/persona/registrar', 'PersonaController@store');
Route::put('/persona/actualizar', 'PersonaController@update');
Route::put('/persona/desactivar', 'PersonaController@desactivar');
Route::put('/persona/activar', 'PersonaController@activar');
