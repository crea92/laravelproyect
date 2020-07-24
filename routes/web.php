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


Route::get('/',             'UsuarioController@index')->name('index');;
Route::get('/nuevo',             'UsuarioController@create')->name('mantenedor.nuevo');
Route::post('/nuevo',             'UsuarioController@store')->name('mantenedor.nuevo');
Route::get('/editar/{id}',             'UsuarioController@edit')->name('mantenedor.editar');
Route::post('/editar',             'UsuarioController@update')->name('mantenedor.actualizar');
Route::get('/eliminar/{id}',             'UsuarioController@destroy')->name('eliminar');

