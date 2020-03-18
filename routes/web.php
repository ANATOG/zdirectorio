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
    return view('contenido/contenido');
});

Route::get('/categoria', 'CategoriaController@index');
Route::post('/categoria/registrar', 'CategoriaController@store');
Route::put('/categoria/actualizar', 'CategoriaController@update');
Route::put('/categoria/desactivar', 'CategoriaController@desactivar');
Route::put('/categoria/activar', 'CategoriaController@activar');


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

