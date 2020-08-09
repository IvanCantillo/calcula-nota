$(document).ready(function() {
	
	$.getScript( "../App/js/parametros.js" );

	
	$('#actualizar_perfil').on('click', function(event) {
		event.preventDefault();
		

		Swal.fire({
			title: '<strong>Actualizacion de Contraseña</strong>',
			html:
			`
			<div class='row'>

			<div class='col'>

			<label for='materia'> Nueva contraseña </label>
			<input type='password' placeholder='Contraseña' class='form-control mb-1' id='password' name='password'></input>

			</div>

			<div class='col'>

			<label for='nota'> Repetir contraseña </label>
			<input type='password' placeholder='Repetir contraseña' class='form-control' id='repetir_password' name='repetir_password'></input>

			</div>

			</div>
			`,
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Actualizar',
			focusConfirm: true,
			cancelButtonText: 'Cancelar',
			preConfirm: () => {

				if ( $('#password').val() != $('#repetir_password').val() ) {

					Swal.showValidationMessage(
						'Ups, las contraseñas no coinciden'
						);

				}

			}
		}).then((result) => {			

			if( result.value ){

				$.ajax({
					url: url_base + 'Usuario/cambiar_password',
					type: 'POST',
					dataType: 'JSON',
					data: {
						password: $('#password').val()
					},
				})
				.done(function(r) {
					
					if( r.exito == 'true' ){

						Swal.fire(
							'¡Excelente!',
							r.msg,
							'success'
							)

					}

				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
				

			}

		});
		

	});

});