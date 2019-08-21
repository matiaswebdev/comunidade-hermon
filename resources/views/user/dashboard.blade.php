@extends('layouts.dashboard')

@section('assets')
  <link rel="stylesheet" type="text/css" href="{{asset('/css/users/user-dashboard.css')}}">
@endsection

@section('content')
	<div class="users-home">
		<h1>Seja bem vindo {{ $user->name }}.</h1>
		<div class="row">
				<div class="user-qtd-registros">
				<div class="icon light-blue"><img src="{{asset('/images/pessoas.svg')}}"></div>
				<div class="value">
					<p class="title">Total de Registros</p>
					<p class="number">{{$data['internos_total_registros']}}</p>
				</div>
			</div>
			<div class="user-qtd-registros">
				<div class="icon roxo"><img src="{{asset('/images/pessoas.svg')}}"></div>
				<div class="value">
					<p class="title">Total de Internos</p>
					<p class="number">{{$data['internos_total_na_comunidade']}}</p>
				</div>
			</div>
		</div>
		
	</div>
	
@endsection