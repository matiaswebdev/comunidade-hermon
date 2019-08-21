@extends('layouts.dashboard')

@section('assets')
  <link rel="stylesheet" type="text/css" href="{{asset('/css/main-form.css')}}">
@endsection

@section('content')
<div class="create-content">
	<h1>REGISTRAR NOVO USUARIO NO SISTEMA</h1>
	@include('messages.flash-messages')
	<p>O nivel de autorizaçao do usuario sera menor ou igual ao usuario atual.</p>
	<form class="my-form" method="POST" action="{{route('usuarios.store')}}">
		@csrf
		<div class="container">
			<ul>
				<li>
					<div class="grid grid-1">
			      	  <div>
			      	  	<label for="nome">Nome</label>	      		
					  	<input id="nome" type="text"  name="name" value="{{ old('name')}}" required>
					  	@if ($errors->first('name'))
				      	  	<div class="error-msg">
								{{ $errors->first('name')}}
							</div>
						@endif
			      	  </div>
			      	  <div>
			      	  	<label for="email">E-mail</label>	      		
					  	<input id="email" type="email"  name="email" value="{{old('email')}}" required>
					  	@if ($errors->first('email'))
				      	  	<div class="error-msg">
								{{ $errors->first('email')}}
							</div>
						@endif
			      	  </div>
					</div>
					<div class="grid grid-2">
						<div>
			      	  		<label for="password">Senha</label>	
					  		<input id="password" type="password"  name="password" value="{{old('password')}}" required>
					  		@if ($errors->first('password'))
					      	  	<div class="error-msg">
									{{ $errors->first('password')}}
								</div>
							@endif
			      	  	</div>
			      	  	<div>
			      	  		<label for="password_confirmation">Confirmar Senha</label>	
					  		<input id="password_confirmation" type="password"  name="password_confirmation" value="{{old('password_confirmation')}}" required>
			      	  	</div>
					</div>
					<div class="grid grid-1"> 
				      		<?php 
				      			$none=''; $administrador=''; $colaborador='';;
				      			if(old('nivel') != null){
				      				switch (old('nivel')) {
				      					case '':
				      						$none = 'selected';
				      						break;
				      					case '1':
				      						$administrador = 'selected';
				      						break;
				      					case '2':
				      						$colaborador = 'selected';
				      						break;
				      				}
				      			}else {
				      				$none = 'selected';
				      			}
				      		 ?>
					      	<div>
					      		<label for="nivel">Nivel de Acesso</label>
					      		<?php $disabled = ($user->nivel == 1) ? '': 'disabled';?>
						      	<select id="nivel" name="nivel">
								  <option {{$none}}    disabled>-- Escolha uma opçao --</option>
								  <option {{$administrador}} {{$disabled}} value="1" >ADMINISTRADOR</option>
								  <option {{$colaborador}}   value="2" >COLABORADOR</option>
								</select>
								@if ($errors->first('nivel'))
				      	  		<div class="error-msg">
									{{ $errors->first('nivel')}}
								</div>
								@endif
							</div>
						</div>
				</li>
				<li>
					<div class="grid grid-2">
					  <button class="btn-grid" type="submit">
					    <span class="back">
					      <h2>></h2>
					    </span>
					    <span class="front">CADASTRAR</span>
					  </button>
					</div>
				</li>
				
			</ul>
		</div>
	</form>
</div>

@endsection