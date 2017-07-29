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
Route::delete('tipo-atividade/{id}/destroy','ActivityTypesController@destroy');

