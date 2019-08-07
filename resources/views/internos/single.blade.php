@extends('layouts.dashboard')

@section('content')
	<?php $interno = $data['interno']; ?>
	<div class="create-content">
		<h1><span>CADASTRO DE </span>{{ strtoupper($interno['nome'])}}</h1>
		<form class="my-form" method="POST" action="/internos/create">
		<ul>
			<li>
				      	<div class="grid grid-1">
				      	  <div>
				      	  	<label for="num_vaga">Vaga</label>	      		
						  	<input id="num_vaga" type="text" value="000{{$interno['num_vaga']}}" name="num_vaga" readonly>
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
				      	  <div class="document-selectors fancy">
				      	  	<label for="">RG</label>
				      	  	<input type="checkbox" <?php if($interno['documentos'][0]['docs_rg']){echo "checked";} ?>>

				      	  	<label for="docs_cpf">CPF</label>
				      	  	<input type="checkbox" <?php if($interno['documentos'][1]['docs_cpf']){echo "checked";} ?>>

				      	  	<label for="docs_titulo">TITULO</label>
				      	  	<input type="checkbox" <?php if($interno['documentos'][2]['docs_titulo']){echo "checked";} ?>>

				      	  	<label for="docs_cnh">CNH</label>
				      	  	<input type="checkbox" <?php if($interno['documentos'][3]['docs_cnh']){echo "checked";} ?>>

				      	  	<label for="docs_ctps">CTPS</label>
				      	  	<input type="checkbox" <?php if($interno['documentos'][4]['docs_ctps']){echo "checked";} ?>>

				      	  	<label for="docs_reservista">RESERVISTA</label>
				      	  	<input type="checkbox" <?php if($interno['documentos'][5]['docs_reservista']){echo "checked";} ?>>

				      	  	<label for="docs_c_nascimento">CERT. NASCIMENTO</label>
				      	  	<input type="checkbox" <?php if($interno['documentos'][6]['docs_c_nascimento']){echo "checked";} ?>>


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
		
	</div>
@endsection