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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('historial','Api\HistorialController@index');

Route::post('historial','Api\HistorialController@filter');

Route::get('municipis','Api\MunicipiController@index');

Route::get( '/comarca/{id}' ,'IncidenciaController@getComarca');

Route::get( '/municipi/{id}' ,'IncidenciaController@getMunicipi');

Route::get( '/centre/{id}' ,'IncidenciaController@getAlertant');

Route::get('/centreid/{id}', 'IncidenciaController@getAlertantbyId');
Route::get('/codiRecurs/{id}', 'IncidenciaController@getRecurs');



