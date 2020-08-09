$(document).ready(function() {

	$.getScript( "../App/js/parametros.js" );

	$('body').on('click', '.eliminar_tarea', function(event) {

		event.preventDefault();
		
		//Rescatamos la id del icono
		let id = $(this).parent('div').children('i').attr('id');

		Swal.fire({
			title: '¡Alerta!',
			text: "¿Estas seguro(a) que deseas eliminar esta tarea?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelButtonText: 'Cancelar',
			confirmButtonText: 'Si, eliminala'
		}).then((result) => {

			if (result.value) {

				$.ajax({
					url: url_base + 'Notas/eliminar_tarea',
					type: 'POST',
					dataType: 'JSON',
					data: {id: id},
				})
				.done(function(r) {

					if( r.exito == 'true' ){

						Swal.fire(
							'¡Tarea eliminada!',
							'La tarea se a eliminado con exito.',
							'success'
							).then((result) => {

								if (result.value) {

									setTimeout(function() {window.location.href = url_base + 'Notas/';}, 1);

								}else{
									setTimeout(function() {window.location.href = url_base + 'Notas/';}, 1);
								}
							});

						}

					})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});

			}
		})
	});

	$('body').on('click', '.actulizar_tarea', function(event) {
		
		event.preventDefault();
		
		//Rescatamos la id del icono
		let id = $(this).parent('div').children('i').attr('id');

		$.ajax({
			url: url_base + 'Notas/buscar_tarea',
			type: 'POST',
			dataType: 'JSON',
			data: {id: id},
		})
		.done(function(r) {
			
			Swal.fire({
				title: 'Actualizacion de tareas',
				input: 'text',
				inputValue: r.msg,
				inputAttributes: {
					autocapitalize: 'off',
				},
				showCancelButton: true,
				cancelButtonText: 'Cancelar',
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Actualizar',
				showLoaderOnConfirm: true,
				preConfirm: (tarea) => {
					if( tarea == '' ){
						Swal.showValidationMessage(
							'Escribe una tarea'
							)
					}
				},
				allowOutsideClick: () => !Swal.isLoading()
			}).then((result) => {

				if (result.value) {

					$.ajax({
						url: url_base + 'Notas/actualizar_tarea',
						type: 'POST',
						dataType: 'JSON',
						data: {tarea: result.value, id: id},
					})
					.done(function(r) {

						if( r.exito == 'true' ){

							Swal.fire(
								'¡Tarea Actualizada!',
								'La tarea se a guardado con exito.',
								'success'
								).then((result) => {

									if (result.value) {

										setTimeout(function() {window.location.href = url_base + 'Notas/';}, 1);

									}else{
										setTimeout(function() {window.location.href = url_base + 'Notas/';}, 1);
									}
								});

							}

						})
					.fail(function() {
						console.log("error");
					})
					.always(function() {
						console.log("complete");
					});

				}

			})

		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});

	$('body').on('click', '.check_tarea', function(event) {

		if ( $(this).prop('checked') ) {

			$.ajax({
				url: url_base + 'Notas/actualizar_estado',
				type: 'POST',
				dataType: 'JSON',
				data: {estado: 0, id: $(this).val()},
			})
			.done(function() {
				setTimeout(function() {window.location.href = url_base + 'Notas/';}, 1);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});


		}else{

			$.ajax({
				url: url_base + 'Notas/actualizar_estado',
				type: 'POST',
				dataType: 'JSON',
				data: {estado: 1, id: $(this).val()},
			})
			.done(function() {
				setTimeout(function() {window.location.href = url_base + 'Notas/';}, 1);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});

		}

	});

	$('#btn-agregar-tarea').click(function(event) {
		Swal.fire({
			title: 'Escribe la tarea que deseas agregar',
			input: 'text',
			inputAttributes: {
				autocapitalize: 'off'
			},
			showCancelButton: true,
			cancelButtonColor: '#d33',
			cancelButtonText: 'Cancelar',
			confirmButtonText: 'Agregar',
			showLoaderOnConfirm: true,
			preConfirm: (tarea) => {

				if( tarea == '' ){
					Swal.showValidationMessage(
						'Escribe una tarea'
						)
				}

			},
		}).then((result) => {

			$.ajax({
				url: url_base + 'Notas/crear_tarea',
				type: 'POST',
				dataType: 'JSON',
				data: {tarea: result.value},
			})
			.done(function(r) {

				if( r.exito == 'true' ){

					Swal.fire(
						'¡Tarea Creada!',
						'La tarea se a guardado con exito.',
						'success'
						).then((result) => {

							if (result.value) {

								setTimeout(function() {window.location.href = url_base + 'Notas/';}, 1);

							}else{
								setTimeout(function() {window.location.href = url_base + 'Notas/';}, 1);
							}
						});

					}

				})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});


		})
	});

});