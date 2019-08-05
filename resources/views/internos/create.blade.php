@extends('layouts.dashboard')

@section('content')
	<div class="create-content">
		<form class="my-form">
		   <div class="container">
		    	<h1>Registrar Interno</h1>
			    <ul>
			          <li>
				      	<div class="grid grid-1">
				      	  <div>
				      	  	<label for="num_vaga">vaga</label>			      		
						  	<input id="num_vaga" type="text" placeholder="" disabled>
				      	  </div>
						</div>
						<div class="grid grid-1">
						  <div>
				      	  	<label for="num_vaga">Nome</label>			      		
						  	<input id="num_vaga" type="text" placeholder="" required>
				      	  </div>
						</div>
						<div class="grid grid-2">
						  <div>
				      	  	<label for="num_vaga">D. Entrada</label>			      		
						  	<input id="num_vaga" type="text" placeholder="" required>
				      	  </div>
				      	  <div>
				      	  	<label for="num_vaga">D. Saida</label>			      		
						  	<input id="num_vaga" type="text" placeholder="">
				      	  </div>
						</div>
						<div class="grid grid-1">
						  <div>
				      	  	<label for="num_vaga">Motivo da saida</label>		      		
						  	<input id="num_vaga" type="text" placeholder="">
				      	  </div>
						</div>
				      </li> 
				      <li>
				      	<div class="grid grid-1">
					      	<div>
					      		<label for="num_vaga">Procedencia</label>
						      	<select>
								  <option selected disabled>-- Escolha uma opçao--</option>
								  <option>FAS</option>
								  <option>CREAS</option>
								  <option>SOCIAL</option>
								  <option>FAMILIA</option>      
								</select>
							</div>
						</div>
					  </li>
				      <li>
				      	<div class="grid grid-2">
				      	  <div>
				      	  	<label for="num_vaga">Nascimento</label>			      		
						  	<input id="num_vaga" type="text" placeholder="" >
				      	  </div>
				      	  <div>
				      	  	<label for="num_vaga">Naturalidade</label>			      		
						  	<input id="num_vaga" type="text" placeholder="" >
				      	  </div>
						</div>
				      </li> 
				      <li>
				      	<div class="grid grid-2">
				      	  <div>
				      	  	<label for="num_vaga">Rg</label>			      		
						  	<input id="num_vaga" type="text" placeholder="" >
				      	  </div>
				      	  <div>
				      	  	<label for="num_vaga">Cpf</label>			      		
						  	<input id="num_vaga" type="text" placeholder="" >
				      	  </div>
						</div>
				      </li> 
				      <li>
				      	<div class="grid grid-2">
				      	  <div>
				      	  	<label for="num_vaga">Pai</label>			      		
						  	<input id="num_vaga" type="text" placeholder="" >
				      	  </div>
				      	  <div>
				      	  	<label for="num_vaga">Mae</label>			      		
						  	<input id="num_vaga" type="text" placeholder="" >
				      	  </div>
						</div>
				      </li>
				      <li>
				      	<div class="grid grid-2">
					      	<div>
					      		<label for="num_vaga">Estado civil</label>
						      	<select>
								  <option selected disabled>-- Escolha uma opçao--</option>
								  <option>CASADO</option>
								  <option>SOLTEIRO</option>
								  <option>DIVORCIADO</option>
								  <option>OUTROS</option>      
								</select>
							</div>
							<div>
					      		<label for="num_vaga">Grau de Instruçao</label>
						      	<select>
								  <option selected disabled>-- Escolha uma opçao--</option>
								  <option>BASICO</option>
								  <option>FUNDAMENTAL</option>
								  <option>MEDIO</option>
								  <option>SUPERIOR</option>      
								</select>
							</div>
						</div>	
					  </li>
					  <li>
				      	<div class="grid grid-1">
				      	  <div>
				      	  	<label for="num_vaga">Pendencia Judicial</label>			      		
						  	<input id="num_vaga" type="text" placeholder="" >
				      	  </div>
						</div>
				      </li> 
				      <li>
				      	<div class="grid grid-1">
				      	  <div>
				      	  	<label for="num_vaga">Motivo Acolhimento</label>			      		
						  	<input id="num_vaga" type="text" placeholder="" >
				      	  </div>
						</div>
				      </li> 
				      <li>
				      	<div class="grid grid-1">
				      	  <div>
				      	  	<label for="num_vaga">Tratamento medico - Remedios</label>
						  	<input id="num_vaga" type="text" placeholder="" >
				      	  </div>
						</div>
				      </li>
				       <li>
				      	<div class="grid grid-2">
				      	  <div>
				      	  	<label for="num_vaga">Profissao</label>			      		
						  	<input id="num_vaga" type="text" placeholder="" >
				      	  </div>
				      	  <div>
				      	  	<label for="num_vaga">Internamento anterior</label>			      		
						  	<input id="num_vaga" type="text" placeholder="" >
				      	  </div>
						</div>
				      </li>
				      <li>
				      	<div class="grid grid-1">
				      	  <div class="document-selectors fancy">
				      	  	<label for="rg">RG</label>
				      	  	<input type="checkbox" id="rg">

				      	  	<label for="cpf">CPF</label>
				      	  	<input type="checkbox" id="cpf">

				      	  	<label for="titulo">TITULO</label>
				      	  	<input type="checkbox" id="titulo">

				      	  	<label for="cnh">CNH</label>
				      	  	<input type="checkbox" id="cnh">

				      	  	<label for="ctps">CTPS</label>
				      	  	<input type="checkbox" id="ctps">

				      	  	<label for="reservista">RESERVISTA</label>
				      	  	<input type="checkbox" id="reservista">

				      	  	<label for="c_nascimento">CERT. NASCIMENTO</label>
				      	  	<input type="checkbox" id="c_nascimento">


				      	  </div>  		
				      	</div>
				      </li>
				      <li>
				      	<div class="grid grid-1">
				      	  <div>
				      	  	<label for="num_vaga">Contato</label>
						  	<input id="num_vaga" type="text" placeholder="" >
				      	  </div>
						</div>
				      </li>
				      <li>
				      	<div class="grid grid-1">
					      	<div>
					      		<label for="num_vaga">Beneficios</label>
						      	<select>
								  <option selected disabled>-- Escolha uma opçao--</option>
								  <option>B.F</option>
								  <option>AUX. DOENCA</option>
								  <option>APOSENTADORIA</option>
								  <option>OUTROS</option>      
								</select>
							</div>
						</div>
					  </li>
				      <li>
				      	<div class="grid grid-1">
				      	  <div>
				      	  	<label for="num_vaga">Atendente</label>			      		
						  	<input id="num_vaga" type="text" placeholder="{{$data['username']}}" disabled>
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