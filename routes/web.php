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

Route::get('/login', function () {
    return view('login');
})->name('login');
  
Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::resource('/incidencia','IncidenciaController');
Route::resource('/alertant','AlertantController');

// Route::get('/alertant', function () {
//     return view('alertants');
// })->name('alertants');


Route::get('/principal', function () {
    return view('taulaIncidencies');
})->name('principal');

Route::get('/historial', function () {
    return view('historial');
})->name('historial');

Route::get('/Incidencia', function () {
    return view('Incidencia');
})->name('Incidencia');

// Route::get('/Incidencies', function () {
//     return view('Incidencies');
// })->name('Incidencies');


