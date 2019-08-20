@extends('layouts.dashboard')

@section('assets')
  <link rel="stylesheet" type="text/css" href="{{asset('/css/users/user-dashboard.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/css/dashboard/dashboard-index.css')}}">
@endsection

@section('content')
	<div class="content">
		<h1>LISTA DE USUÁRIOS</h1>
		<div class="busca">
			<form id="logout-form" action="{{ route('usuarios') }}" method="GET">
               @csrf
				  <div class="webflow-style-input">
				    <input name="busca" type="text" placeholder="Buscar usuários"></input>
				    <button type="submit" ><i class="icon ion-android-arrow-forward">></i></button>
				  </div>
      </form>		
		</div>
			@if (count($data['usuarios']) > 0)

<div class="wrapper">
  
  <div class="table">
    
    <div class="row header">
      <div class="cell">
        Nome
      </div>
      <div class="cell">
        Nível de acesso
      </div>
    </div>

    @foreach ($data['usuarios'] as $usuario)
    <div class="row">
      <div class="cell" data-title="nome">
        <a class="css-nome" href="#">{{$usuario['name']}}</a>
      </div>
      <div class="cell" data-title="data_entrada">
        <?php if($usuario->nivel == 1){echo 'Administrador';}else{echo 'Colaborador';} ?>
      </div>
    </div>
    @endforeach

  </div>
  <div class="pagination-wrapper">
  	{{$data['usuarios']->links()}}
  </div>
  
</div>
	
@endif
@if (!isset($data['usuarios']) || count($data['usuarios']) < 1)
	<div class="listagem">
		<p>Nenhum registro encontrado.</p>
	</div>
@endif

</div>
@endsection