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


// Rotas para adiministração de internos
Route::middleware(['auth'])->group( function () {
	
		Route::get('/internos/index', 'InternosController@index')->name('internos.index');
		Route::get('/internos/create', 'InternosController@create')->name('internos.create');
		Route::post('/internos/create', 'InternosController@store')->name('internos.store');
		Route::post('/internos/buscar', 'InternosController@buscar')->name('internos.buscar');
		Route::get('/internos/interno/{id}', 'InternosController@interno')->name('internos.interno');
		Route::get('/internos/saida/{id}', 'InternosController@saidaform')->name('internos.saida');
		Route::post('/internos/saida/{id}', 'InternosController@saidaupdate')->name('internos.saidaupdate');
		Route::get('/internos/edit/{id}', 'InternosController@edit')->name('internos.edit');
		Route::post('/internos/update/{id}', 'InternosController@update')->name('internos.update');
		Route::get('/internos/editall/{id}', 'InternosController@editall')->name('internos.editall');
		Route::post('/internos/updateall/{id}', 'InternosController@updateall')->name('internos.updateall');
	
});


// Rotas para usuario
// Route::get('/usuarios/login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('/usuarios/login', 'Auth\LoginController@login');
// Route::post('/usuarios/logout', 'Auth\LoginController@logout')->name('logout');
Route::middleware(['auth'])->group( function () {
	 Route::get('/usuarios/registrar', 'UsuarioController@showRegistrationForm')->name('usuarios.registrar');
	 Route::post('/usuarios/registrar', 'UsuarioController@store')->name('usuarios.store');
});




