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

Route::get('/register', 'Auth\RegisterController@showRegister')->name('register');
Route::post('/register', 'Auth\RegisterController@register');



Route::group(['middleware' => ['auth']], function () {
    Route::resource('/incidencia','IncidenciaController');

    Route::resource('/alertant','AlertantController');
    
    Route::resource('/rmobils','RecursMobilController');


    Route::get('/historial', function () {
        return view('historial');
    })->name('historial');
<<<<<<< HEAD
});

Route::resource('/usuario', 'UsuarioController');



=======
    
    Route::get('/novaIncidencia', function(){
        return view('Incidencia');
    });
    
});
>>>>>>> 56fb94d0bdf748f82a7d3010b567d8bdcd35bb14
