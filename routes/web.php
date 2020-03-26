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
    return view('index');
})->name('home');

Route::get('/login', 'Auth\LoginController@showLogin')->name('login');
Route::post('/login','Auth\LoginController@login');
Route::get('/logout','Auth\LoginController@logout')->name('logout');


Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/incidencia','IncidenciaController');

    Route::resource('/alertant','AlertantController');

    Route::get('/historial', function () {
        return view('historial');
    })->name('historial');
});



