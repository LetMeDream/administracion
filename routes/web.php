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
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/** Since we can't register without login in. I'll try to do the 'registering' by myself. */
Route::post('/users', 'HomeController@store');

/** In here we will try and do all 7 resource methods in one line of code */
Route::resource('trabajos', 'TrabajoController');

/** Ruta para que el admin vea todos los trabajos de los usuarios */
Route::get('usuarios', 'AdminController@index');
Route::get('usuarios/{usuario}', 'AdminController@show');
/** Tratando de setear el Price de un trabajo específico */
Route::post('/setPrice/{trabajoId}', 'AdminController@setPrice');