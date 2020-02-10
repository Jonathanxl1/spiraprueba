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

Route::get('/alumnos', 'AlumnosController@index')->name('alumnos');
Route::get('/alumnos/{id}', 'AlumnosController@read');
Route::get('/cursos', 'CursosController@index');
Route::get('/cursos/alumnos', 'CursosController@alumnos');
Route::get('/colegio', 'AlumnosCursosController@index');
Route::post('/alumnos', 'AlumnosController@create')->name('add');
Route::put('/alumnos/{id}','AlumnosController@update')->name('update');
Route::delete('/alumnos/{id}','AlumnosController@delete');

Route::get('/', function(){
	return view('home');
})->name('home');

Route::get('/agregar',function(){
	return view('add');
})->name('agregar');

Route::get('/edit/{id}','AlumnosController@edit');

