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


// Login routes
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

// Página inicial pública
Route::get('/', function () {
    return view('welcome');
});

// Rota para a área de trabalho
Route::middleware(['auth'])->group( function () {
	Route::get('/dashboard', 'UsuarioController@dashboard')->name('user.dashboard');
});


// Rotas para adiministração de registros
Route::middleware(['auth'])->group( function () {
	
		Route::get('/internos/index', 'InternosController@index')->name('internos.index');
		Route::get('/internos/create', 'InternosController@create')->name('internos.create');
		Route::post('/internos/create', 'InternosController@store')->name('internos.store');
	
	
});




