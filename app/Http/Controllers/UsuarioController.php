<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
   
	 public function dashboard(){
	 	$data = [
	 		'username' => \Auth::user()->name,
	 		'cargo' => 'Colaborador'
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

}