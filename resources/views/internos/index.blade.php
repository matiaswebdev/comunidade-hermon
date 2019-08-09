@extends('layouts.dashboard')

@section('assets')
  <link rel="stylesheet" type="text/css" href="{{asset('/css/dashboard/dashboard-index.css')}}">
@endsection

@section('content')
	<div class="content">
		<h1>LISTA DE INTERNOS</h1>
		<div class="busca">
			<form id="logout-form" action="{{ route('internos.index') }}" method="GET">
               @csrf
				  <div class="webflow-style-input">
				    <input name="busca" type="text" placeholder="Buscar internos"></input>
				    <button type="submit" ><i class="icon ion-android-arrow-forward">></i></button>
				  </div>
            </form>		
		</div>
			@if (count($data['internos']) > 0)

<div class="wrapper">
  
  <div class="table">
    
    <div class="row header">
      <div class="cell">
        Nome
      </div>
      <div class="cell">
        D.Entrada
      </div>
      <div class="cell">
        No Hermon
      </div>
      <div class="cell">
        Ação
      </div>
    </div>

    @foreach ($data['internos'] as $interno)
    <div class="row">
      <div class="cell" data-title="nome">
        <a class="css-nome" href="/internos/interno/{{$interno['id']}}">{{ucfirst($interno['nome'])}}</a>
      </div>
      <div class="cell" data-title="data_entrada">
        {{$interno['data_entrada']}}
      </div>
      <div class="cell" data-title="na_comunidade">
       	@if ($interno['data_saida'] == '')
       		sim
       	@else
       		não
       	@endif
      </div>
      <div class="cell" data-title="acao">
        <a class="index-ver" href="/internos/interno/{{$interno['id']}}"><button>Ver</button></a>
      </div>
    </div>
    @endforeach

  </div>
  <div class="pagination-wrapper">
  	{{$data['internos']->links()}}
  </div>
  
</div>
	
@endif
@if (!isset($data['internos']) || count($data['internos']) < 1)
	<div class="listagem">
		<p>Nenhum registro encontrado.</p>
	</div>
@endif

</div>
@endsection