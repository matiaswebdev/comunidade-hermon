@extends('layouts.dashboard')

@section('content')
	<div class="content">
		<h2>Lista de Internos</h2>
		<div class="busca">
			<form id="logout-form" action="{{ route('internos') }}" method="GET">
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
    					<div class="listagem-circle"></div>
    					<div class="dados">
    						<p><span>Nome: </span> {{ $interno['nome']}} </p>
    						<p><span>D.Entrada: </span>  {{ $interno['data_entrada']}}</p>
    					</div>
    				</div>
				@endforeach	
			@endif
			@if (!isset($data['internos']) || count($data['internos']) < 1)
				<div class="listagem">
    				<p>Nenhum registro encontrado.</p>
    			</div>
			@endif
		
	</div>
@endsection