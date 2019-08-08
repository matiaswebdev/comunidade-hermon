@extends('layouts.dashboard')

@section('assets')
  <link rel="stylesheet" type="text/css" href="{{asset('/css/main-form.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/css/dashboard/dashboard-saida.css')}}">
@endsection

@section('content')
<div class="create-content">
	<h1>REGISTRAR TERMINO DO TRATAMENTO </h1>
	<form class="my-form" method="POST" action="/internos/create">
		<div class="container">
			<ul>
				<li>
					<div class="grid grid-2">
			      	  <div>
			      	  	<label for="num_vaga">Vaga</label>	      		
					  	<input id="num_vaga" type="text" value="" name="num_vaga" required>
			      	  </div>
			      	  <div>
			      	  	<label for="num_vaga">Vaga</label>	      		
					  	<input id="num_vaga" type="text" value="" name="num_vaga" required>
			      	  </div>
					</div>
				</li>
			</ul>
		</div>
	</form>
</div>

@endsection