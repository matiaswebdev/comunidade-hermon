@extends('layouts.dashboard')

@section('assets')
  <link rel="stylesheet" type="text/css" href="{{asset('/css/main-form.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/css/dashboard/dashboard-saida.css')}}">
@endsection

@section('content')
<?php $interno = $data['interno']; ?>
<div class="create-content">
	<h1>REGISTRAR TERMINO DO TRATAMENTO </h1>
	<p>Registrar data de término de tratamento para: <span>{{$interno['nome']}}</span>?</p>
	<form class="my-form" method="POST" action="/internos/saida/{{$interno['id']}}">
		@csrf
		<div class="container">
			<ul>
				<li>
					<div class="grid grid-2">
			      	  <div>
			      	  	<label>D. Entrada</label>	      		
					  	<input id="data_entrada" type="text" value="{{$interno['data_entrada']}}" name="num_vaga" readonly>
			      	  </div>
			      	  <div>
			      	  	<label for="data_saida">D. Saída</label>	      		
					  	<input id="data_saida" type="text"  name="data_saida" onkeypress="mascaraData(this)" required>
			      	  </div>
					</div>
					<div class="grid grid-1">
						<div>
			      	  		<label for="motivo_saida">Motivo da Saída</label>	
					  		<input id="motivo_saida" type="text"  name="motivo_saida" required>
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