@extends('layouts.dashboard')

@section('assets')
  <link rel="stylesheet" type="text/css" href="{{asset('/css/main-form.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/css/dashboard/dashboard-create.css')}}">
@endsection

@section('content')
	<div class="create-content">
			<?php $interno = $data['interno']; ?>
			@if (!empty($errors->all()))
			<div class="top-erro-message">
				<p>Existem erros no preenchimento por favor corriga os campos em vermelho. </p>
			</div>
			@endif
		<form class="my-form" method="POST" action="{{url('/internos/update/'.$interno['id'])}}">
			@csrf
		   <div class="container">
		    	<h1><span style="color: #505050;">NOVO INTERNAMENTO </span> {{strtoupper($interno['nome'])}}</h1>
			    <ul>
			          <li>
				      	<div class="grid grid-1">
				      	  <div>
				      	  	<label for="num_vaga">Vaga</label>	      		
						  	<input id="num_vaga" type="text" value="{{$interno['num_vaga']}}" readonly>
				      	  </div>
						</div>
						
						<div class="grid grid-2">
						  <div>
				      	  	<label for="data_entrada">D. Entrada</label>			      		
						  	<input id="data_entrada" type="text" maxlength="10"  value="" name="data_entrada" required>
						  	@if ($errors->first('data_entrada'))
				      	  	<div class="error-msg">
								{{ $errors->first('data_entrada')}}
							</div>
							@endif
				      	  </div>
				      	  
				      	  <div>
				      	  	<label for="data_saida">D. Saida</label>			      		
						  	<input id="data_saida" type="text" maxlength="10"  name="data_saida"  disabled>
						  	 @if ($errors->first('data_saida'))
				      	  	<div class="error-msg">
								{{ $errors->first('data_saida')}}
							</div>
							@endif
				      	  </div>
				      	 
						</div>
						<div class="grid grid-1">
						  <div>
				      	  	<label for="motivo_saida">Motivo da saida</label>		      		
						  	<input id="motivo_saida" name="motivo_saida" type="text" value="" disabled>
						  	@if ($errors->first('motivo_saida'))
				      	  	<div class="error-msg">
								{{ $errors->first('motivo_saida')}}
							</div>
							@endif
				      	  </div>
						</div>
						<li>
				      	<div class="grid grid-1"> 
				      		<?php 
				      			$none=''; $fas=''; $creas=''; $social=''; $familia='';
				      			if($interno['procedencia']){
				      				switch ($interno['procedencia']) {
				      					case '':
				      						$none = 'selected';
				      						break;
				      					case 'fas':
				      						$fas = 'selected';
				      						break;
				      					case 'creas':
				      						$creas = 'selected';
				      						break;
				      					case 'social':
				      						$social = 'selected';
				      						break;
				      					case 'familia':
				      						$familia = 'selected';
				      						break;
				      				}
				      			}else {
				      				$none = 'selected';
				      			}
				      		 ?>
					      	<div>
					      		<label for="procedencia">Procedencia</label>
						      	<select id="procedencia" name="procedencia">
								  <option {{$none}}    disabled>-- Escolha uma opçao --</option>
								  <option {{$fas}}     value="fas">FAS</option>
								  <option {{$creas}}   value="creas">CREAS</option>
								  <option {{$social}}  value="social">SOCIAL</option>
								  <option {{$familia}} value="familia">FAMILIA</option> 
								</select>
								@if ($errors->first('procedencia'))
				      	  		<div class="error-msg">
									{{ $errors->first('procedencia')}}
								</div>
								@endif
							</div>
						</div>
					  </li>
						<div class="grid grid-1">
						  <div>
				      	  	<label for="nome">Nome</label>			      		
						  	<input id="nome" type="nome" data-url="{{url('/')}}" name="nome" value="{{$interno['nome']}}" autocomplete="off" required>
						  	<div class="loader" id="ajax-loader" style="display: none;">Loading...</div>
						  	@if ($errors->first('nome'))
				      	  	<div class="error-msg">
								{{ $errors->first('nome')}}
							</div>
							@endif
							<div class="error-msg" id="ajax-error-msg" style="display: none;">
								<!-- url para interno sera adicionada via js -->
								Ja existe um cadastro com esse nome. <a href="" id="js-create-userid-link">Ver</a>
							</div>
				      	  </div>
						</div>
						
				      </li>

				      <li>
				      	<div class="grid grid-2">
				      	  <div>
				      	  	<label for="nascimento">Nascimento</label>			      		
						  	<input id="nascimento" type="text" maxlength="10" name="nascimento" value="{{$interno['nascimento']}}" >
						  	@if ($errors->first('nascimento'))
				      	  		<div class="error-msg">
									{{ $errors->first('nascimento')}}
								</div>
							@endif
				      	  </div>
				      	  <div>
				      	  	<label for="naturalidade">Naturalidade</label>			      		
						  	<input id="naturalidade" type="text" name="naturalidade" value="{{$interno['naturalidade']}}" >
						  	@if ($errors->first('naturalidade'))
				      	  		<div class="error-msg">
									{{ $errors->first('naturalidade')}}
								</div>
							@endif
				      	  </div>
						</div>
				      </li> 
				      <li>
				      	<div class="grid grid-2">
				      	  <div>
				      	  	<label for="rg">Rg</label>			      		
						  	<input id="rg" type="text" name="rg" value="{{$interno['rg']}}" >
						  	@if ($errors->first('rg'))
				      	  		<div class="error-msg">
									{{ $errors->first('rg')}}
								</div>
							@endif
				      	  </div>
				      	  <div>
				      	  	<label for="cpf">Cpf</label>			      		
						  	<input id="cpf" type="text" name="cpf" value="{{$interno['cpf']}}" >
						  	@if ($errors->first('cpf'))
				      	  		<div class="error-msg">
									{{ $errors->first('cpf')}}
								</div>
							@endif
				      	  </div>
						</div>
				      </li> 
				      <li>
				      	<div class="grid grid-2">
				      	  <div>
				      	  	<label for="nome_pai">Pai</label>			      		
						  	<input id="nome_pai" type="text" name="nome_pai" value="{{$interno['nome_pai']}}" >
						  	@if ($errors->first('nome_pai'))
				      	  		<div class="error-msg">
									{{ $errors->first('nome_pai')}}
								</div>
							@endif
				      	  </div>
				      	  <div>
				      	  	<label for="nome_mae">Mae</label>			      		
						  	<input id="nome_mae" type="text" name="nome_mae" value="{{$interno['nome_mae']}}" >
						  	@if ($errors->first('nome_mae'))
				      	  		<div class="error-msg">
									{{ $errors->first('nome_mae')}}
								</div>
							@endif
				      	  </div>
						</div>
				      </li>
				      <li>
				      	<div class="grid grid-2">
				      		<?php 
				      			$none=''; $casado=''; $solteiro=''; $divorciado=''; $outros='';
				      			if($interno['estado_civil']){
				      				switch ($interno['estado_civil']) {
				      					case '':
				      						$none = 'selected';
				      						break;
				      					case 'casado':
				      						$casado = 'selected';
				      						break;
				      					case 'solteiro':
				      						$solteiro = 'selected';
				      						break;
				      					case 'divorciado':
				      						$divorciado = 'selected';
				      						break;
				      					case 'outros':
				      						$outros = 'selected';
				      						break;
				      				}
				      			}else {
				      				$none = 'selected';
				      			}
				      		 ?>
					      	<div>
					      		<label for="estado_civil">Estado civil</label>
						      	<select id="estado_civil" name="estado_civil">
								  <option {{$none}} disabled>-- Escolha uma opçao--</option>
								  <option {{$casado}} value="casado">CASADO</option>
								  <option {{$solteiro}} value="solteiro">SOLTEIRO</option>
								  <option {{$divorciado}} value="divorciado">DIVORCIADO</option>
								  <option {{$outros}} value="outros">OUTROS</option>      
								</select>
								@if ($errors->first('estado_civil'))
				      	  		<div class="error-msg">
									{{ $errors->first('estado_civil')}}
								</div>
								@endif
							</div>
							<div>
								<?php 
				      			$none=''; $basico=''; $fundamental=''; $medio=''; $superior='';
				      			if($interno['grau_instrucao']){
				      				switch ($interno['grau_instrucao']) {
				      					case '':
				      						$none = 'selected';
				      						break;
				      					case 'basico':
				      						$basico = 'selected';
				      						break;
				      					case 'fundamental':
				      						$fundamental = 'selected';
				      						break;
				      					case 'medio':
				      						$medio = 'selected';
				      						break;
				      					case 'superior':
				      						$superior = 'selected';
				      						break;
				      				}
				      			}else {
				      				$none = 'selected';
				      			}
				      		 ?>
					      		<label for="grau_instrucao">Grau de Instruçao</label>
						      	<select id="grau_instrucao" name="grau_instrucao">
								  <option {{$none}} disabled>-- Escolha uma opçao--</option>
								  <option {{$basico}} value="basico">BASICO</option>
								  <option {{$fundamental}} value="fundamental">FUNDAMENTAL</option>
								  <option {{$medio}} value="medio">MEDIO</option>
								  <option {{$superior}} value="superior">SUPERIOR</option>      
								</select>
								@if ($errors->first('grau_instrucao'))
				      	  		<div class="error-msg">
									{{ $errors->first('grau_instrucao')}}
								</div>
								@endif
							</div>
						</div>	
					  </li>
					  <li>
				      	<div class="grid grid-1">
				      	  <div>
				      	  	<label for="pendencia_judicial">Pendencia Judicial</label>
						  	<input id="pendencia_judicial" type="text" name="pendencia_judicial" value="{{$interno['pendencia_judicial']}}" >
				      	  </div>
						</div>
				      </li> 
				      <li>
				      	<div class="grid grid-1">
				      	  <div>
				      	  	<label for="motivo_acolhimento">Motivo Acolhimento</label>	
						  	<input id="motivo_acolhimento" type="text" name="motivo_acolhimento" value="{{$interno['motivo_acolhimento']}}" >
				      	  </div>
						</div>
				      </li> 
				      <li>
				      	<div class="grid grid-1">
				      	  <div>
				      	  	<label for="tratamento_medico">Tratamento medico - Remedios</label>
						  	<input id="tratamento_medico" type="text" name="tratamento_medico" value="{{$interno['tratamento_medico']}}" >
				      	  </div>
						</div>
				      </li>
				       <li>
				      	<div class="grid grid-2">
				      	  <div>
				      	  	<label for="profissao">Profissao</label>			      		
						  	<input id="profissao" type="text" name="profissao" value="{{$interno['profissao']}}" >
				      	  </div>
				      	  <div>
				      	  	<label for="internamento_anterior">Internamento anterior</label>
						  	<input id="internamento_anterior" type="text" name="internamento_anterior" value="{{$interno['internamento_anterior']}}" >
				      	  </div>
						</div>
				      </li>
				      <li>
				      	<label for="">Possui documentos:</label>
				      	<div class="grid grid-1">
				      	  <div class="document-selectors fancy">
				      	  	<label for="docs_rg">RG</label>
				      	  	<input type="checkbox" <?php if($interno->documentos[0]['docs_rg']){echo "checked";} ?> name="docs_rg" id="docs_rg">
				      	  	<label for="docs_cpf">CPF</label>
				      	  	<input type="checkbox" <?php if($interno->documentos[1]['docs_cpf']){echo "checked";} ?> name="docs_cpf" id="docs_cpf">

				      	  	<label for="docs_titulo">TITULO</label>
				      	  	<input type="checkbox" <?php if($interno->documentos[2]['docs_titulo']){echo "checked";} ?> name="docs_titulo" id="docs_titulo">

				      	  	<label for="docs_cnh">CNH</label>
				      	  	<input type="checkbox" <?php if($interno->documentos[3]['docs_cnh']){echo "checked";} ?> name="docs_cnh" id="docs_cnh">

				      	  	<label for="docs_ctps">CTPS</label>
				      	  	<input type="checkbox" <?php if($interno->documentos[4]['docs_ctps']){echo "checked";} ?> name="docs_ctps" id="docs_ctps">

				      	  	<label for="docs_reservista">RESERVISTA</label>
				      	  	<input type="checkbox" <?php if($interno->documentos[5]['docs_reservista']){echo "checked";} ?> name="docs_reservista" id="docs_reservista">

				      	  	<label for="docs_c_nascimento">CERT. NASCIMENTO</label>
				      	  	<input type="checkbox" <?php if($interno->documentos[6]['docs_c_nascimento']){echo "checked";} ?> name="docs_c_nascimento" id="docs_c_nascimento">


				      	  </div>  		
				      	</div>
				      </li>
				      <li>
				      	<div class="grid grid-1">
				      	  <div>
				      	  	<label for="contato">Contato</label>
						  	<input id="contato" type="text" name="contato" value="{{$interno['contato']}}" >
				      	  </div>
						</div>
				      </li>
				      <li>
				      	<div class="grid grid-1">
				      		<?php 
				      			$none=''; $bf=''; $aux_doenca=''; $aposentadoria=''; $outros='';
				      			if($interno['beneficios']){
				      				switch ($interno['beneficios']) {
				      					case '':
				      						$none = 'selected';
				      						break;
				      					case 'bf':
				      						$bf = 'selected';
				      						break;
				      					case 'aux_doenca':
				      						$aux_doenca = 'selected';
				      						break;
				      					case 'aposentadoria':
				      						$aposentadoria = 'selected';
				      						break;
				      					case 'outros':
				      						$outros = 'selected';
				      						break;
				      				}
				      			}else {
				      				$none = "selected";
				      			}
				      		 ?>
					      	<div>
					      		<label for="beneficios">Possui beneficios?</label>
						      	<select id="beneficios" name="beneficios">
								  <option {{$none}} disabled>-- Escolha uma opçao--</option>
								  <option {{$bf}} value="bf">B.F</option>
								  <option {{$aux_doenca}} value="aux_doenca">AUX. DOENCA</option>
								  <option {{$aposentadoria}} value="aposentadoria">APOSENTADORIA</option>
								  <option {{$outros}} value="outros">OUTROS</option>      
								</select>
								@if ($errors->first('beneficios'))
				      	  		<div class="error-msg">
									{{ $errors->first('beneficios')}}
								</div>
								@endif
							</div>
						</div>
					  </li>
				      <li>
				      	<div class="grid grid-1">
				      	  <div>
				      	  	<label for="atendente">Atendente</label>
				      	  	<input type="hidden" name="atendente" value="{{$data['userid']}}">	      		
						  	<input id="atd" type="text" placeholder="{{$data['username']}}">
						  	@if ($errors->first('atendente'))
				      	  		<div class="error-msg">
									{{ $errors->first('atendente')}}
								</div>
							@endif
				      	  </div>
						</div>
				      </li>    
				      <li class="terms">
				      	<input type="checkbox" id="terms">
						<label for="terms">Interno tem ciência das regras da instituição</label>
				      </li>
				      <li>
				      	<div class="grid grid-3">
						  <div class="required-msg">Campos Obrigatórios <div></div></div>
						  <button class="btn-grid" type="submit" disabled>
						    <span class="back">
						      <img src="IMG_SRC" alt="">
						    </span>
						    <span class="front">EDITAR</span>
						  </button>
						  <button class="btn-grid" type="reset" disabled>
						    <span class="back">
						      <img src="IMG_SRC" alt="">
						    </span>
						    <span class="front">LIMPAR</span>
						  </button> 
						</div>
				      </li>
			    </ul>
		  	</div>
		</form>
	</div>
@endsection