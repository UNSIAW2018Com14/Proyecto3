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

Route::get('/','IndexController@create') -> name('home');

//Sesión
Route::get('/login', 'SessionController@create')-> name('login');
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy')->middleware('auth')->name('logout');

//Integrantes
Route::get('/{agregar}/integrantes', 'IntegranteController@create')->middleware('auth');
Route::post('/agregar/integrantes', 'IntegranteController@store')->middleware('auth');
Route::get('/{modificar}/integrantes', 'IntegranteController@create')->middleware('auth');
Route::post('/modificar/integrantes', 'IntegranteController@update')->middleware('auth');
Route::get('/{eliminar}/integrantes', 'IntegranteController@create')->middleware('auth');
Route::post('/eliminar/integrantes', 'IntegranteController@delete')->middleware('auth');

//Equipos
Route::get('/{agregar}/equipos', 'EquipoController@create')->middleware('auth');
Route::post('/agregar/equipos', 'EquipoController@store')->middleware('auth');
Route::get('/{modificar}/equipos', 'EquipoController@create')->middleware('auth');
Route::post('/modificar/equipos', 'EquipoController@update')->middleware('auth');
Route::get('/{eliminar}/equipos', 'EquipoController@create')->middleware('auth');
Route::post('/eliminar/equipos', 'EquipoController@delete')->middleware('auth');

//Enfrentamientos
Route::get('/{agregar}/enfrentamientos', 'EnfrentamientoController@create')->middleware('auth');
Route::post('/agregar/enfrentamientos', 'EnfrentamientoController@store')->middleware('auth');
Route::get('/{modificar}/enfrentamientos', 'EnfrentamientoController@create')->middleware('auth');
Route::post('/modificar/enfrentamientos', 'EnfrentamientoController@update')->middleware('auth');
Route::get('/{eliminar}/enfrentamientos', 'EnfrentamientoController@create')->middleware('auth');
Route::post('/eliminar/enfrentamientos', 'EnfrentamientoController@delete')->middleware('auth');

//Instancias
Route::get('/{agregar}/instancias', 'InstanciaController@create')->middleware('auth');
Route::post('/agregar/instancias', 'InstanciaController@store')->middleware('auth');
Route::get('/{modificar}/instancias', 'InstanciaController@create')->middleware('auth');
Route::post('/modificar/instancias', 'InstanciaController@update')->middleware('auth');
Route::get('/{eliminar}/instancias', 'InstanciaController@create')->middleware('auth');
Route::post('/eliminar/instancias', 'InstanciaController@delete')->middleware('auth');

//Bo5s
Route::get('/{agregar}/bo5s', 'Bo5Controller@create')->middleware('auth');
Route::post('/agregar/bo5s', 'Bo5Controller@store')->middleware('auth');
Route::get('/{modificar}/bo5s', 'Bo5Controller@create')->middleware('auth');
Route::post('/modificar/bo5s', 'Bo5Controller@update')->middleware('auth');
Route::get('/{eliminar}/bo5s', 'Bo5Controller@create')->middleware('auth');
Route::post('/eliminar/bo5s', 'Bo5Controller@delete')->middleware('auth');


