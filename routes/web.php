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

Route::get('tipo-atividade/list','ActivityTypesController@index');
Route::post('tipo-atividade/create','ActivityTypesController@store');
Route::put('tipo-atividade/{id}/update','ActivityTypesController@update');
Route::delete('tipo-atividade/{id}/destroy','ActivityTypesController@destroy');

Route::get('regulamentos/list','RegulationsController@index');
Route::post('regulamentos/create','RegulationsController@store');
Route::put('regulamentos/{id}/update','RegulationsController@update');
Route::delete('regulamentos/{id}/destroy','RegulationsController@destroy');

Route::get('cursos/list','CoursesController@index');
Route::post('cursos/create','CoursesController@store');
Route::put('cursos/{id}/update','CoursesController@update');
Route::delete('cursos/{id}/destroy','CoursesController@destroy');


