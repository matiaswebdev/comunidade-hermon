<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UsuarioController extends Controller
{
   
	 public function dashboard(){
	 	$data = [
	 		'username' => \Auth::user()->name,
	 		'cargo' => 'Colaborador',
	 		'internos_total_registros' => \App\Internos::count(),
	 		'internos_total_na_comunidade' => \App\Internos::where('data_saida', NULL)->count()
	 	];

	 	return view('user.dashboard')->with('data', $data);
	 }


	 public function internos(Request $request) {
	 	$data = [
	 		'username' => \Auth::user()->name,
	 		'cargo' => 'Colaborador',
	 		'internos' => \App\User::where('name', 'like', '%'.$request['busca'].'%')->get()
	 	];

	 	return view('user.dashboard')->with('data', $data);
	 }

	 public function showRegistrationForm() {
	 	$user = \Auth::user();
	 	$data = [
	 		'username' => $user->name,
	 		'nivel' => $user->nivel,
	 		'cargo' => 'Colaborador'
	 	];
	 	return view('user.register')->with('data', $data);
	 }

	 public function store(Request $request) {
	 	
	 	$this->validate(request(), [
	 		'name' => 'required',
	 		'email' => 'required|email|unique:users',
	 		'password' => 'required|min:6|confirmed',
	 		'nivel' => 'required'
	 	]);

	 	$user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'nivel' => $request['nivel']
        ]);

	 	if($user){
	 		return redirect()->route('usuarios.registrar')->with('success', 'Usuario registrado com successo!');
	 	}
	 }

}