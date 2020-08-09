$(document).ready(function() {
	let form = $('#form_registro');

//Aqui se importan los toast
$.getScript( "../App/js/toast.js" );
$.getScript( "../App/js/parametros.js" );

form.on('submit', function(event) {
	event.preventDefault();


	if( $('#password').val() != $('#password-confirm').val() ){

		toast_e( "Las contraseñas no coinciden." );

	}else{

		$.ajax({
			url: url_base + 'Usuario/guardar',
			type: 'POST',
			dataType: 'JSON',
			data: form.serialize(),
		})
		.done(function(r) {
			if( r.exito ){

				if ( r.exito === 'true' ) {
					toast_s( r.msg );
					setTimeout(function() {
						window.location.href = url_base + 'Notas/';
					}, 2000);
				}else if( r.exito === 'false' ){

					toast_e( r.msg );

				}else if( r.exito === 'warning' ){

					toast_w( r.msg );

				}else if( r.exito === 'info' ){

					toast_i( r.msg );

				}


			}		
		})
		.fail(function(r) {
			console.log( r.exito );
		})
		.always(function() {
			console.log("complete");
		});

	}

});

});
