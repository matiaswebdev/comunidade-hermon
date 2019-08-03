@extends('layouts.dashboard')

@section('content')
	<div class="content">
		<h2>Lista de Internos</h2>
		<div class="busca">
			<form id="logout-form" action="{{ route('user.internos') }}" method="GET">
               @csrf
				  <div class="webflow-style-input">
				    <input name="busca" type="text" placeholder="Buscar internos"></input>
				    <button type="submit" ><i class="icon ion-android-arrow-forward">></i></button>
				  </div>
            </form>		
		</div>
		
			@if ( isset($data['internos']) )
    			@foreach ($data['internos'] as $interno)
    				<div class="listagem">
    					<p>Nome: {{ $interno['name']}} Email: {{ $interno['email']}}</p>
    				</div>
				@endforeach	
			@endif
		
	</div>
@endsection