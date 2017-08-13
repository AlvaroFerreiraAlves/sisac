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

//=========================================Routes_Courses=========================================================================

Route::get('cursos/list','CoursesController@index');
Route::get('cursos/{id}/show','CoursesController@show');
Route::post('cursos/create','CoursesController@store');
Route::put('cursos/{id}/update','CoursesController@update');
Route::delete('cursos/{id}/destroy','CoursesController@destroy');

//=========================================Routes_Activity_types=========================================================================

Route::get('tipo-atividade/list','ActivityTypesController@index');
Route::get('tipo-atividade/{id}/show','ActivityTypesController@show');
Route::post('tipo-atividade/create','ActivityTypesController@store');
Route::put('tipo-atividade/{id}/update','ActivityTypesController@update');
Route::delete('tipo-atividade/{id}/destroy','ActivityTypesController@destroy');

//=========================================Routes_Regulations=========================================================================

Route::get('regulamentos/list','RegulationsController@index');
Route::get('regulamentos/{id}/show','RegulationsController@show');
Route::post('regulamentos/create','RegulationsController@store');
Route::put('regulamentos/{id}/update','RegulationsController@update');
Route::delete('regulamentos/{id}/destroy','RegulationsController@destroy');

//=========================================Routes_User_types=========================================================================

Route::get('tipo-usuario/list','UserTypesController@index');
Route::get('tipo-usuario/{id}/show','UserTypesController@show');
Route::post('tipo-usuario/create','UserTypesController@store');
Route::put('tipo-usuario/{id}/update','UserTypesController@update');
Route::delete('tipo-usuario/{id}/destroy','UserTypesController@destroy');

//=========================================Routes_Users=========================================================================

Route::get('usuario/list','UsersController@index');
Route::get('usuario/{id}/show','UsersController@show');
Route::post('usuario/create','UsersController@store');
Route::put('usuario/{id}/update','UsersController@update');
Route::delete('usuario/{id}/destroy','UsersController@destroy');

//=========================================Routes_Solicitations=========================================================================

Route::get('solicitacao/list','SolicitationsController@index');
Route::get('solicitacao/{id}/show','SolicitationsController@show');
Route::post('solicitacao/create','SolicitationsController@store');
Route::put('solicitacao/{id}/update','SolicitationsController@update');
Route::delete('solicitacao/{id}/destroy','SolicitationsController@destroy');

//=========================================Routes_Processes=========================================================================

Route::get('processsos/list','ProcessesController@index');
Route::get('processsos/{id}/show','ProcessesController@show');
Route::post('processsos/create','ProcessesController@store');
Route::put('processsos/{id}/update','ProcessesController@update');
Route::delete('processsos/{id}/destroy','ProcessesController@destroy');

//=========================================Routes_Activities=========================================================================

Route::get('atividades/list','ActivitiesController@index');
Route::get('atividades/{id}/show','ActivitiesController@show');
Route::post('atividades/create','ActivitiesController@store');
Route::put('atividades/{id}/update','ActivitiesController@update');
Route::delete('atividades/{id}/destroy','ActivitiesController@destroy');
