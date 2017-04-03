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

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::post('authenticate', 'AuthenticateController@authenticate');
Route::get('/categorias', 'CategoriasController@index');
Route::get('/juegos/{id}', 'JuegosController@show');

Route::group(['middleware' => 'guest'], function(){
	Route::post('/categorias', 'CategoriasController@store');
	Route::post('/categorias/{id}', 'CategoriasController@update');
	Route::post('/categorias/delete/{id}', 'CategoriasController@destroy');
	Route::post('/juegos', 'JuegosController@store');
	Route::post('/juegos/{id}', 'JuegosController@update');
	Route::post('/juegos/delete/{id}', 'JuegosController@destroy');
});
