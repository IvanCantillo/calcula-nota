$(document).ready(function() {

	$.getScript( "../App/js/parametros.js" );

	$('body').on('click', '.btn-eliminar', function(e) {


		e.preventDefault();
		
		var id_eliminar = $(this).attr("href");

		Swal.fire({
			title: '¡Alerta!',
			text: "¿Estas seguro(a) de eliminar esta materia?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelButtonText: 'Cancelar',
			confirmButtonText: 'Si, eliminala'
		}).then((result) => {
			if (result.value) {

				$.ajax({
					url: url_base + 'Notas/eliminar',
					type: 'POST',
					dataType: 'JSON',
					data: {enviar: true, id: id_eliminar},
				})
				.done(function(r) {

					if( r.exito ){

						if( r.exito == 'true' ){

							Swal.fire(
								'Eliminado',
								'La materia se a eliminado correctamente.',
								'success'
								).then((result) => {

									if (result.value) {

										setTimeout(function() {window.location.href = url_base + 'Notas/mis_notas';}, 1);

									}else{
										setTimeout(function() {window.location.href = url_base + 'Notas/mis_notas';}, 1);
									}
								});

							}

						}


					})
				.fail(function(r) {
					console.log("error " + r.exito);
				})
				.always(function() {
					console.log("complete");
				});
				
			}
		})
	});

	$('body').on('click', '.btn-actualizar', function(e) {


		e.preventDefault();
		
		var id = $(this).attr("href");

		$.ajax({
			url: url_base + 'Notas/buscar_nota',
			type: 'POST',
			dataType: 'JSON',
			data: {id: id},
		})
		.done(function(r) {
			
			Swal.fire({
				title: '<strong>Actualizacion de notas</strong>',
				html:
				`
				<div class='row'>

				<div class='col'>

				<label for='materia'> Materia </label>
				<input type='text' value='${r.materia}' class='form-control mb-1' id='materia' name='materia'></input>

				</div>

				<div class='col'>

				<label for='nota'> Notas </label>
				<input type='text' value='${r.nota}' class='form-control' id='nota' name='nota'></input>

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

					if ( !$('#materia').val() ) {

						Swal.showValidationMessage(
							'Ups, se te ah olvidado la escribir la materia'
							)

					}else if ( !$('#nota').val() ) {

						Swal.showValidationMessage(
							'Ups, se te ah olvidado escribir la nota'
							)

					}

				}
			}).then((result) => {

				if (result.value) {
					
					$.ajax({
						url: url_base + 'Notas/actualizar',
						type: 'POST',
						dataType: 'JSON',
						data: {
							id: id, 
							nota: $('#nota').val(), 
							materia: $('#materia').val()
						},
					})
					.done(function(r) {

						if( r.exito == 'true' ){

							Swal.fire(
								'¡Materia Actualizada!',
								'La materia se a actualizado con exito. ',
								'success'
								)
							.then((result) => {

								if (result.value) {

									setTimeout(function() {window.location.href = url_base + 'Notas/mis_notas';}, 1);

								}else{
									setTimeout(function() {window.location.href = url_base + 'Notas/mis_notas';}, 1);
								}
							});

						}


					})
					.fail(function(r) {
						console.log("error" + r.exito);
					})
					.always(function() {
						console.log("complete");
					});

				}
				
			})



		})
		.fail(function(r) {
			console.log("error " + r.exito);
		})
		.always(function() {
			console.log("complete");
		});

	});


});