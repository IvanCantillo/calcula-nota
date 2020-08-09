$(document).ready(function() {

	$.getScript( "../App/js/parametros.js" );

	$('#agregar').on('click', function() {
		
		var template = $('#template-notas').html();

		$('#notas').append(template);

	});

	$('body').on('click', '.eliminar', function() {
		
		$(this).parent().parent().remove();

	});

	var form = $('#form-notas');

	form.on('submit', function(e) {
		e.preventDefault();

		$.ajax({
			url: url_base + 'Notas/calcular_nota',
			type: 'POST',
			dataType: 'JSON',
			data: form.serialize(),
		})
		// rm -> Resultado de la Materia.
		.done(function(rm) {

			if( rm.exito ){

				if( rm.exito == 'true' ){

					Swal.fire({
						title: 'La nota final de la materia ' + rm.materia + ' es: ' + rm.nota,
						text: "¿Deseas guardar esta nota?",
						icon: 'success',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						cancelButtonText: 'Cancelar',
						confirmButtonText: 'Si, guardala'
					}).then((result) => {

						if (result.value) {

							$.ajax({
								url: url_base + 'Notas/guardar',
								type: 'POST',
								dataType: 'JSON',
								data: {
									materia: rm.materia,
									nota: rm.nota,
									enviar: true
								},
							})
							// rg-> Resultado Guardar.
							.done(function(rg) {

								if( rg.exito ){

									if( rg.exito == 'true' ){

										Swal.fire(
											'¡Nota guardada!',
											'La nota se a guardado correctamente.',
											'success'
											);

									}else if( rg.exito == 'warning' ){

										Swal.fire({
											title: rg.msg,
											icon: 'warning',
											showCancelButton: true,
											confirmButtonColor: '#3085d6',
											cancelButtonColor: '#d33',
											cancelButtonText: 'Cancelar',
											confirmButtonText: 'Si, actualizala'

										}).then((result) => {

											if ( result.value ){

												$.ajax({
													url: url_base + 'Notas/actualizar',
													type: 'POST',
													dataType: 'JSON',
													data: {
														id: rg.id, 
														materia: rm.materia,
														nota: rm.nota
													},
												})
												//ra -> Resultado Actualizar.
												.done(function(ra) {

													if( ra.exito == 'true' ){

														Swal.fire(
															'¡Nota actualizada!',
															'La nota se a actualizado correctamente.',
															'success'
															);

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

									}

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

				}else if( r.exito == 'false' ){

					Swal.fire({
						title: r.msg,
						icon: 'error',
						confirmButtonColor: '#3085d6',
						confirmButtonText: 'Entiendo'
					})

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

