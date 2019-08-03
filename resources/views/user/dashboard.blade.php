@extends('layouts.dashboard')

@section('content')
	<div class="content">
		Bem vindo a área de trabalho {{ $data['username']}}! A seguir um relatório com a situação atual da comunidade.

		<div class="busca">
			<form id="logout-form" action="{{ route('user.internos') }}" method="GET">
               @csrf
               <input type="text" name="busca" placeholder="busca por nome">
               <button type="submit" name="submit">buscar</button>
            </form>		
		</div>

		@if ( isset($data['internos']) )
    		@foreach ($data['internos'] as $interno)
    			
    				<p>Nome: {{ $interno['name']}} Email: {{ $interno['email']}}</p> 
			
			@endforeach	
		@endif

	</div>
@endsection