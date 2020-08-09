$(document).ready(function() {

	let form = $('#form_recuperar_password');

	$.getScript( "../App/js/toast.js" );
	$.getScript( "../App/js/parametros.js" );


	form.on('submit', function(event) {
		event.preventDefault();
		
		$.ajax({
			url: url_base + 'Usuario/recuperar',
			type: 'POST',
			dataType: 'JSON',
			data: form.serialize(),
			beforeSend: function(){
				$('#btn_recuperar_password').attr('disabled', 'disabled');
				$('#btn_recuperar_password').append(' <i class="fas fa-spinner fa-spin"></i>')
			}
		})
		.done(function(r) {

			$('#btn_recuperar_password').removeAttr('disabled');
			$('#btn_recuperar_password').children('i').remove();

			if( r.exito ){

				if ( r.exito == 'true' ) {


					Swal.fire(
						'Correo enviado',
						r.msg,
						'success'
						)

				}else{

					toast_e( r.msg );

				}

			}

		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		

	});
});