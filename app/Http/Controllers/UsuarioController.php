<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UsuarioController extends Controller
{
   
	 public function dashboard(){
	 	
	 	$data = [
	 		'internos_total_registros' => \App\Internos::count(),
	 		'internos_total_na_comunidade' => \App\Internos::where('data_saida', NULL)->count()
	 	];

	 	return view('user.dashboard')->with('data', $data);
	 }


	 public function usuarios(Request $request) {
	 	$data = [
	 		'usuarios' => \App\User::where('name', 'like', '%'.$request['busca'].'%')->paginate(3)
	 	];

	 	return view('user.usuarios')->with('data', $data);
	 }

	 public function showRegistrationForm() {
	 	return view('user.register');
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