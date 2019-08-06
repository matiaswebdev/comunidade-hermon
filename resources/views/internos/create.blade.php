@extends('layouts.dashboard')

@section('content')
	<div class="create-content">
		<form class="my-form" method="POST" action="/internos/create">
			@csrf
		   <div class="container">
		    	<h1>Registrar Interno</h1>
			    <ul>
			          <li>
				      	<div class="grid grid-1">
				      	  <div>
				      	  	<label for="num_vaga">Vaga</label>	      		
						  	<input id="num_vaga" type="text" value="000{{$data['next_num_vaga']}}" name="num_vaga" required>
				      	  </div>
						</div>
						<div class="grid grid-1">
						  <div>
				      	  	<label for="nome">Nome</label>			      		
						  	<input id="num_vaga" type="nome" name="nome" value="{{old('nome')}}" required>
						  	@if ($errors->first('nome'))
				      	  	<div class="error-msg">
								{{ $errors->first('nome')}}
							</div>
							@endif
				      	  </div>
						</div>
						<div class="grid grid-2">
						  <div>
				      	  	<label for="data_entrada">D. Entrada</label>			      		
						  	<input id="data_entrada" type="text" maxlength="10" onkeypress="mascaraData(this)" value="{{old('data_entrada')}}" name="data_entrada" required>
						  	@if ($errors->first('data_entrada'))
				      	  	<div class="error-msg">
								{{ $errors->first('data_entrada')}}
							</div>
							@endif
				      	  </div>
				      	  
				      	  <div>
				      	  	<label for="data_saida">D. Saida</label>			      		
						  	<input id="data_saida" type="text" maxlength="10" onkeypress="mascaraData(this)" name="data_saida" value="{{old('data_saida')}}">
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
						  	<input id="motivo_saida" name="motivo_saida" type="text" value="{{old('motivo_saida')}}">
						  	@if ($errors->first('motivo_saida'))
				      	  	<div class="error-msg">
								{{ $errors->first('motivo_saida')}}
							</div>
							@endif
				      	  </div>
						</div>
				      </li> 
				      <li>
				      	<div class="grid grid-1">
					      	<div>
					      		<label for="procedencia">Procedencia</label>
						      	<select id="procedencia" name="procedencia">
								  <option selected disabled>-- Escolha uma opçao--</option>
								  <option value="fas">FAS</option>
								  <option value="creas">CREAS</option>
								  <option value="social">SOCIAL</option>
								  <option value="familia">FAMILIA</option>    
								</select>
								@if ($errors->first('procedencia'))
				      	  		<div class="error-msg">
									{{ $errors->first('procedencia')}}
								</div>
								@endif
							</div>
						</div>
					  </li>
				      <li>
				      	<div class="grid grid-2">
				      	  <div>
				      	  	<label for="nascimento">Nascimento</label>			      		
						  	<input id="nascimento" type="text" maxlength="10" onkeypress="mascaraData(this)" name="nascimento" value="{{old('nascimento')}}" >
						  	@if ($errors->first('nascimento'))
				      	  		<div class="error-msg">
									{{ $errors->first('nascimento')}}
								</div>
							@endif
				      	  </div>
				      	  <div>
				      	  	<label for="naturalidade">Naturalidade</label>			      		
						  	<input id="naturalidade" type="text" name="naturalidade" value="{{old('naturalidade')}}" >
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
						  	<input id="rg" type="text" name="rg" value="{{old('rg')}}" >
						  	@if ($errors->first('rg'))
				      	  		<div class="error-msg">
									{{ $errors->first('rg')}}
								</div>
							@endif
				      	  </div>
				      	  <div>
				      	  	<label for="cpf">Cpf</label>			      		
						  	<input id="cpf" type="text" name="cpf" value="{{old('cpf')}}" >
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
						  	<input id="nome_pai" type="text" name="nome_pai" value="{{old('nome_pai')}}" >
						  	@if ($errors->first('nome_pai'))
				      	  		<div class="error-msg">
									{{ $errors->first('nome_pai')}}
								</div>
							@endif
				      	  </div>
				      	  <div>
				      	  	<label for="nome_mae">Mae</label>			      		
						  	<input id="nome_mae" type="text" name="nome_mae" value="{{old('nome_mae')}}" >
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
					      	<div>
					      		<label for="estado_civil">Estado civil</label>
						      	<select id="estado_civil" name="estado_civil">
								  <option selected disabled>-- Escolha uma opçao--</option>
								  <option value="casado">CASADO</option>
								  <option value="solteiro">SOLTEIRO</option>
								  <option value="divorciado">DIVORCIADO</option>
								  <option value="outros">OUTROS</option>      
								</select>
								@if ($errors->first('estado_civil'))
				      	  		<div class="error-msg">
									{{ $errors->first('estado_civil')}}
								</div>
								@endif
							</div>
							<div>
					      		<label for="grau_instrucao">Grau de Instruçao</label>
						      	<select id="grau_instrucao" name="grau_instrucao">
								  <option selected disabled>-- Escolha uma opçao--</option>
								  <option value="basico">BASICO</option>
								  <option value="fundamental">FUNDAMENTAL</option>
								  <option value="medio">MEDIO</option>
								  <option value="superior">SUPERIOR</option>      
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
						  	<input id="pendencia_judicial" type="text" name="pendencia_judicial" value="{{old('pendencia_judicial')}}" >
				      	  </div>
						</div>
				      </li> 
				      <li>
				      	<div class="grid grid-1">
				      	  <div>
				      	  	<label for="motivo_acolhimento">Motivo Acolhimento</label>	
						  	<input id="motivo_acolhimento" type="text" name="motivo_acolhimento" value="{{old('motivo_acolhimento')}}" >
				      	  </div>
						</div>
				      </li> 
				      <li>
				      	<div class="grid grid-1">
				      	  <div>
				      	  	<label for="tratamento_medico">Tratamento medico - Remedios</label>
						  	<input id="tratamento_medico" type="text" name="tratamento_medico" value="{{old('tratamento_medico')}}" >
				      	  </div>
						</div>
				      </li>
				       <li>
				      	<div class="grid grid-2">
				      	  <div>
				      	  	<label for="profissao">Profissao</label>			      		
						  	<input id="profissao" type="text" name="profissao" value="{{old('profissao')}}" >
				      	  </div>
				      	  <div>
				      	  	<label for="internamento_anterior">Internamento anterior</label>
						  	<input id="internamento_anterior" type="text" name="internamento_anterior" value="{{old('internamento_anterior')}}" >
				      	  </div>
						</div>
				      </li>
				      <li>
				      	<div class="grid grid-1">
				      	  <div class="document-selectors fancy">
				      	  	<label for="docs_rg">RG</label>
				      	  	<input type="checkbox" name="docs_rg" id="docs_rg">

				      	  	<label for="docs_cpf">CPF</label>
				      	  	<input type="checkbox" name="docs_cpf" id="docs_cpf">

				      	  	<label for="docs_titulo">TITULO</label>
				      	  	<input type="checkbox" name="docs_titulo" id="docs_titulo">

				      	  	<label for="docs_cnh">CNH</label>
				      	  	<input type="checkbox" name="docs_cnh" id="docs_cnh">

				      	  	<label for="docs_ctps">CTPS</label>
				      	  	<input type="checkbox" name="docs_ctps" id="docs_ctps">

				      	  	<label for="docs_reservista">RESERVISTA</label>
				      	  	<input type="checkbox" name="docs_reservista" id="docs_reservista">

				      	  	<label for="docs_c_nascimento">CERT. NASCIMENTO</label>
				      	  	<input type="checkbox" name="docs_c_nascimento" id="docs_c_nascimento">


				      	  </div>  		
				      	</div>
				      </li>
				      <li>
				      	<div class="grid grid-1">
				      	  <div>
				      	  	<label for="contato">Contato</label>
						  	<input id="contato" type="text" name="contato" value="{{old('contato')}}" >
				      	  </div>
						</div>
				      </li>
				      <li>
				      	<div class="grid grid-1">
					      	<div>
					      		<label for="beneficios">Beneficios</label>
						      	<select id="beneficios" name="beneficios">
								  <option selected disabled>-- Escolha uma opçao--</option>
								  <option value="bf">B.F</option>
								  <option value="aux_doenca">AUX. DOENCA</option>
								  <option value="aposentadoria">APOSENTADORIA</option>
								  <option value="outros">OUTROS</option>      
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
						    <span class="front">CADASTRAR</span>
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