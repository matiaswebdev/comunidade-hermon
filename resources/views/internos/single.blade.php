@extends('layouts.dashboard') <!-- Adiciona estrutura principal da dashboard -->

@section('assets') <!-- estilo do formulario e estilo local desta área -->
  <link rel="stylesheet" type="text/css" href="{{asset('/css/main-form.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/css/dashboard/dashboard-single.css')}}">
@endsection

@section('content') <!-- conteúdo principal -->
	<?php 
		// Variáveis globais
		$interno = $data['interno'];
		$internamentos = $data['internamentos'];
		$saida_disabled = ($interno['data_saida'] == '') ? '' : 'disabled';
		$entrada_disabled = ($interno['data_saida'] == '') ? 'disabled' : '';
		$historico_disabled = ($internamentos->count() > 0) ? '' : 'disabled';
	?>

	<div class="create-content">
		<!-- Header -->
		<div class="single-header">
			<h1><span>CADASTRO DE </span>{{ strtoupper($interno['nome'])}}</h1>
			<div class="single-btns">
				<a class="saida-btn" href="{{url('/internos/saida/'. $interno['id'])}}"><button {{$saida_disabled}}>Registrar Saida</button></a>
				<a class="saida-btn" href="{{url('/internos/edit/'. $interno['id'])}}"><button {{$entrada_disabled}}>Novo Internamento</button></a>
				<a class="saida-btn" id="js-single-show-modal" href="#"><button {{$historico_disabled}}>Histórico</button></a>
				<a class="saida-btn" id="" href="{{url('/internos/editall/'. $interno['id'])}}"><button >Editar</button></a>
				<a class="saida-btn danger" id="js-single-show-excluir" href="#"><button disabled>Excluir registro</button></a>
			</div>
			@include('messages.flash-messages')
		</div>
		<!-- Fim Header -->
		<!-- Histórico Modal -->
		<div class="historico-modal" id="historico-modal">
			<div class="card">
				<div class="card-close" id="close">Fechar</div>
				<div class="card-header"><h2>Histórico</h2></div>
				<div class="card-body">
					
<table class="zui-table">
    <thead>
        <tr>
            <th>Entrada</th>
            <th>Saída</th>
            <th>Motivo da Saída</th>
        </tr>
    </thead>

    <tbody>
		@foreach ($internamentos as $internamento)		 
        <tr>
            <td>{{ $internamento->data_entrada }}</td>
            <td>{{ $internamento->data_saida }}</td>
            <td>{{ $internamento->motivo_saida }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
				</div>
			</div>
		</div>
		<!-- Fim Histórico Modal -->
		<!-- Form 
			Este formulário não tem action, somente para herdar o css padrão.
		-->
		<form class="my-form" method="" action="">
			<ul>
				<li>
			      	<div class="grid grid-1">
			      	  <div>
			      	  	<label for="num_vaga">Vaga</label>	      		
					  	<input id="num_vaga" type="text" value="000{{$interno['num_vaga']}}" name="num_vaga" readonly>
			      	  </div>
					</div>
					<div class="grid grid-2">
					  <div>
			      	  	<label for="nome">D. Entrada</label>			      		
					  	<input id="nome" type="nome" name="nome" value="{{$interno['data_entrada']}}" readonly>
			      	  </div>
			      	  <div>
			      	  	<label for="nome">D. Saída</label>			      		
					  	<input id="nome" type="nome" name="nome" value="{{$interno['data_saida']}}" readonly>
			      	  </div>
					</div>
					<div class="grid grid-1">
					  <div>
			      	  	<label for="nome">Motivo da Saída</label>			      		
					  	<input id="nome" type="nome" name="nome" value="{{$interno['motivo_saida']}}" readonly>
			      	  </div>
					</div>
					<div class="grid grid-1">
					  <div>
			      	  	<label for="nome">Procedência</label>			      		
					  	<input id="nome" type="nome" name="nome" value="{{$interno['procedencia']}}" readonly>
			      	  </div>
					</div>

					<div class="grid grid-1">
					  <div>
			      	  	<label for="nome">Nome</label>			      		
					  	<input id="nome" type="nome" name="nome" value="{{$interno['nome']}}" readonly>
			      	  </div>
					</div>	
					<div class="grid grid-2">
					  <div>
			      	  	<label for="nome">Nascimento</label>			      		
					  	<input id="nome" type="nome" name="nome" value="{{$interno['nascimento']}}" readonly>
			      	  </div>
			      	  <div>
			      	  	<label for="nome">Naturalidade</label>			      		
					  	<input id="nome" type="nome" name="nome" value="{{$interno['naturalidade']}}" readonly>
			      	  </div>
					</div>
					<div class="grid grid-2">
					  <div>
			      	  	<label for="nome">Rg</label>			      		
					  	<input id="nome" type="nome" name="nome" value="{{$interno['rg']}}" readonly>
			      	  </div>
			      	  <div>
			      	  	<label for="nome">Cpf</label>			      		
					  	<input id="nome" type="nome" name="nome" value="{{$interno['cpf']}}" readonly>
			      	  </div>
					</div>
					<div class="grid grid-2">
					  <div>
			      	  	<label for="nome">Pai</label>			      		
					  	<input id="nome" type="nome" name="nome" value="{{$interno['nome_pai']}}" readonly>
			      	  </div>
			      	  <div>
			      	  	<label for="nome">Mãe</label>			      		
					  	<input id="nome" type="nome" name="nome" value="{{$interno['nome_mae']}}" readonly>
			      	  </div>
					</div>
					<div class="grid grid-2">
					  <div>
			      	  	<label for="nome">Estado civil</label>			      		
					  	<input id="nome" type="nome" name="nome" value="{{$interno['estado_civil']}}" readonly>
			      	  </div>
			      	  <div>
			      	  	<label for="nome">Grau de instrução</label>			      		
					  	<input id="nome" type="nome" name="nome" value="{{$interno['grau_instrucao']}}" readonly>
			      	  </div>
					</div>
					<div class="grid grid-1">
					  <div>
			      	  	<label for="nome">Pendência Judicial</label>			      		
					  	<input id="nome" type="nome" name="nome" value="{{$interno['pendencia_judicial']}}" readonly>
			      	  </div>
					</div>
					<div class="grid grid-1">
					  <div>
			      	  	<label for="nome">Motivo do Acolhimento</label>			      		
					  	<input id="nome" type="nome" name="nome" value="{{$interno['motivo_acolhimento']}}" readonly>
			      	  </div>
					</div>
					<div class="grid grid-1">
					  <div>
			      	  	<label for="nome">Tratamento Médico - Remédios</label>			      		
					  	<input id="nome" type="nome" name="nome" value="{{$interno['tratamento_medico']}}" readonly>
			      	  </div>
					</div>
					<div class="grid grid-2">
					  <div>
			      	  	<label for="nome">Profissão</label>			      		
					  	<input id="nome" type="nome" name="nome" value="{{$interno['profissao']}}" readonly>
			      	  </div>
			      	  <div>
			      	  	<label for="nome">Internamento Anterior</label>			      		
					  	<input id="nome" type="nome" name="nome" value="{{$interno['internamento_anterior']}}" readonly>
			      	  </div>
					</div>
			      </li>
			      <li>
			      	<div class="grid grid-1">
			      	  <?php $documentos = $interno['documentos']; ?>
			      	  <div class="document-selectors fancy">
			      	  	<label for="">RG</label>
			      	  	<input type="checkbox" <?php if(in_array('rg', $documentos)){echo "checked";} ?>>

			      	  	<label for="docs_cpf">CPF</label>
			      	  	<input type="checkbox" <?php if(in_array('cpf', $documentos)){echo "checked";} ?>>

			      	  	<label for="docs_titulo">TITULO</label>
			      	  	<input type="checkbox" <?php if(in_array('titulo', $documentos)){echo "checked";} ?>>

			      	  	<label for="docs_cnh">CNH</label>
			      	  	<input type="checkbox" <?php if(in_array('cnh', $documentos)){echo "checked";} ?>>

			      	  	<label for="docs_ctps">CTPS</label>
			      	  	<input type="checkbox" <?php if(in_array('ctps', $documentos)){echo "checked";} ?>>

			      	  	<label for="docs_reservista">RESERVISTA</label>
			      	  	<input type="checkbox" <?php if(in_array('reservista', $documentos)){echo "checked";} ?>>

			      	  	<label for="docs_c_nascimento">CERT. NASCIMENTO</label>
			      	  	<input type="checkbox" <?php if(in_array('nascimento', $documentos)){echo "checked";} ?>>
			      	  </div>  		
			      	</div>

			      	<div class="grid grid-1">
					  <div>
			      	  	<label for="nome">Contato</label>			      		
					  	<input id="nome" type="nome" name="nome" value="{{$interno['contato']}}" readonly>
			      	  </div>
					</div>

					<div class="grid grid-1">
					  <div>
			      	  	<label for="nome">Benefícios</label>			      		
					  	<input id="nome" type="nome" name="nome" value="{{strtoupper($interno['beneficios'])}}" readonly>
			      	  </div>
					</div>

					<div class="grid grid-1">
					  <div>
			      	  	<label for="nome">Atendente</label>			      		
					  	<input id="nome" type="nome" name="nome" value="{{$interno['atendente']}}" readonly>
			      	  </div>
					</div>
				</li>
			</ul>
		</form>
		<!-- Fim Form -->
		
	</div>
@endsection