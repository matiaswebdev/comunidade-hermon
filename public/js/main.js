
/*
*
*
*
*
*
* Controla o blur dos botões do formulário de ativos.
*
*
*
*
*
*/ 

const checkbox = document.querySelector('.terms #terms');
const btns = document.querySelectorAll(".my-form button");

if(checkbox !== null){
	checkbox.addEventListener("change", function() {
	  	const checked = this.checked;
	  	for (const btn of btns) {
	    	checked ? (btn.disabled = false) : (btn.disabled = true);
	  	}
	});
}



/*
*
*
*
*
*
* Verifica se interno ja tem cadastro no 
* sistema antes de preencher todo o formulario.
*
*
*
*
*/ 


$(document).ready(()=>{

	var timeout = null;

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
		}
	});

	$('#nome').on('keyup', ()=>{
		var url = $('#nome').attr('data-url');
		if($('#nome').val().length > 3){
			clearTimeout(timeout);

			timeout = setTimeout(()=>{

				var nome = $('#nome').val()

				$.ajax({
				type: 'POST',
				url: `${url}/internos/buscar`,
				data : {search: nome},
				beforeSend: () => {
					$('#ajax-error-msg').hide();
					$('#ajax-loader').show();
				}
				})
				.done((msg)=>{
					$('#js-create-userid-link').attr('href', url + '/internos/interno/' + msg.id);
					$('#ajax-loader').hide();
					$('#ajax-error-msg').hide();
					var isEmpty = jQuery.isEmptyObject(msg);
					if(!isEmpty){
						$('#ajax-error-msg').show();
					}
				})
				.fail((jqXHR, textStatus, msg)=> {
					console.log(msg);
				})

			}, 1000);
			
		}
	});
});


/*
*
*
*
*
*
* Menu esquerdo da dashboard toggler para o menu
* 
*
*
*
*
*/

//Pega o primeiro valor da uri atual
const actual_location = $(location).attr('href').split('/')[3];

if(actual_location === 'internos'){
	$('#internos').addClass('selected');
}

$('#internos').click((ev)=>{
	$('#internos').toggleClass('selected');
});


if(actual_location === 'usuarios'){
	$('#usuarios').addClass('selected');
}

$('#usuarios').click((ev)=>{
	$('#usuarios').toggleClass('selected');
});

if(actual_location === 'restricoes'){
	$('#restricoes').addClass('selected');
}
$('#restricoes').click((ev)=>{
	$('#restricoes').toggleClass('selected');
});

if(actual_location === 'relatorios'){
	$('#relatorios').addClass('selected');
}

$('#relatorios').click((ev)=>{
	$('#relatorios').toggleClass('selected');
});

if(actual_location === 'relatorios'){
	$('#relatorios').addClass('selected');
}

$('#suporte').click((ev)=>{
	ev.preventDefault();
	$('#suporte').toggleClass('selected');
});








/*
*
*
*
*
*
* flatpickr plugin data picker para os campos de data
* 
*
*
*
*
*/ 
flatpickr.localize(flatpickr.l10ns.pt);

const config ={
    altInput: true,
    altFormat: "j/m/Y",
    dateFormat: "d/m/Y"
}

$(document).ready(()=>{
    $("#data_entrada").flatpickr(config);
    $("#data_saida").flatpickr(config);
    $("#nascimento").flatpickr(config);
});


/*
*
*
*
*
*
* mostra modal histórico de internamentos na pagina single interno
* 
*
*
*
*
*/ 
$(document).ready(()=>{
	$('#js-single-show-modal').on('click', ()=>{
		$('#historico-modal').show();
	})

	$('#close').on('click', ()=>{
		$('#historico-modal').hide();
	})
})


/*
*
*
*
*
*
* mostra modal histórico de internamentos na pagina single interno
* 
*
*
*
*
*/ 
$(document).ready(()=>{
	$('.msg').fadeIn(1500);
	setTimeout(()=>{
		$('.msg').fadeOut(1500);
	}, 3000)
	
})