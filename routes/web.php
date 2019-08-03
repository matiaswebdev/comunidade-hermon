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

Route::middleware(['auth'])->group( function () {
	Route::get('/dashboard', 'UsuarioController@dashboard')->name('user.dashboard');
});

Route::middleware(['auth'])->group( function () {
	Route::get('/internos', 'UsuarioController@internos')->name('user.internos');
});




// Login routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
