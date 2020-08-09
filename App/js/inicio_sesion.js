$(document).ready(function() {
	let form = $('#form_login');

//Aqui se importan los toast
$.getScript( "../App/js/toast.js" );
$.getScript( "../App/js/parametros.js" );

form.on('submit', function(event) {
	event.preventDefault();

	$.ajax({
		url: url_base + 'Usuario/iniciar_sesion',
		type: 'POST',
		dataType: 'JSON',
		data: form.serialize(),
	})
	.done(function(r) {

		if( r.exito ){

			if ( r.exito == 'true' ) {

				toast_s( r.msg );

				setTimeout(function() {
					window.location.href = url_base + 'Notas/';
				}, 2000);

			}else if ( r.exito == 'false' ) {

				toast_e( r.msg );

			}
			
		}	
		
	})
	.fail(function(r) {
		console.log("error" + r.exito);
	})
	.always(function() {
		console.log("complete");
	});


});

});
