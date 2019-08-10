
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
				url: `${url}/internos/show`,
				data : {search: nome},
				beforeSend: () => {
					$('#ajax-error-msg').hide();
					$('#ajax-loader').show();
				}
				})
				.done((msg)=>{
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

$('#usuarios').click((ev)=>{
	ev.preventDefault();
	$('#usuarios').toggleClass('selected');
});

$('#restricoes').click((ev)=>{
	ev.preventDefault();
	$('#restricoes').toggleClass('selected');
});

$('#relatorios').click((ev)=>{
	ev.preventDefault();
	$('#relatorios').toggleClass('selected');
});

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
    dateFormat: "Y-m-d"
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
* mostra historico de internamentos na pagina single interno
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