<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Calcula Tu Nota | Inicio</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php require_once 'App/styles.php'; ?>

</head>
<body class="hold-transition sidebar-mini  sidebar-collapse">
	<!-- Site wrapper -->
	<div class="wrapper">

		<!-- Navbar -->
		<?php require_once 'Comunes/Navbar.php'; ?>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<?php require_once 'Comunes/Menu.php'; ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">

			<section class="content-header">

				<div class="container-fluid">

					<div class="row">

						<div class="col">

							<h1>Calcular Nota</h1>

						</div>

						<div class="col-4 text-right">

							<button class="btn btn-success" id="agregar">
								<i class="fas fa-plus"></i> 
								Agregar
							</button>

						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>

			<!-- Main content -->
			<section class="content">

				<!-- Default box -->
				<div class="card">
					<div class="card-body">
						<form id="form-notas">

							<div class="row">

								<div class="col">
									<div class="input-group mb-3">
										<input type="text" class="form-control" id="materia" required name="materia" placeholder="Nombre de la materia">
										<div class="input-group-append">
											<div class="input-group-text">
												<span class="fas fa-book"></span>
											</div>
										</div>
									</div>
									

								</div>

							</div>


							<div class="row">

								<div class="col overflow-auto" style="height: 200px">
									<div id="notas">

										<div class="row">

											<div class="input-group mb-3 col">
												<input type="text" class="form-control" id="nota" required name="nota[]" placeholder="Nota">
												<div class="input-group-append">
													<div class="input-group-text">
														<span class="fas fa-hashtag"></span>
													</div>
												</div>
											</div>
											<div class="input-group mb-3 col">
												<input type="text" class="form-control" id="porcentaje" required name="porcentaje[]" placeholder="Porcentaje">
												<div class="input-group-append">
													<div class="input-group-text">
														<span class="fas fa-percent"></span>
													</div>
												</div>
											</div>
											<div class="col-2 text-center">
												<button class="btn btn-danger eliminar"> <i class="fas fa-trash-alt"></i></button>
											</div>

										</div>

									</div>
								</div>

							</div>
							


							<div class="form-group text-right mt-3">
								<div class="row justify-content-center">
									<div class="col-4">
										<div class="input-group mb-3">
											<input type="text" class="form-control" id="nota_min" required name="nota_min" placeholder="Nota Minima">
											<div class="input-group-append">
												<div class="input-group-text">
													<span class="fas fa-minus"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-4">
										<div class="input-group mb-3">
											<input type="text" class="form-control" id="nota_max" required name="nota_max" placeholder="Nota Maxima">
											<div class="input-group-append">
												<div class="input-group-text">
													<span class="fas fa-plus"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-4">
										<button type="submit" name="enviar" id="enviar" class="btn btn-primary btn-block"> 
											<i class="fas fa-calculator"></i> Calcular 
										</button>
									</div>
								</div>

							</div>

						</form>

					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->

				<template id="template-notas">

					<div class="row">

						<div class="input-group mb-3 col">
							<input type="text" class="form-control" id="nota" name="nota[]" required placeholder="Nota">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-hashtag"></span>
								</div>
							</div>
						</div>
						<div class="input-group mb-3 col">
							<input type="text" class="form-control" id="porcentaje" name="porcentaje[]" required placeholder="Porcentaje">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-percent"></span>
								</div>
							</div>
						</div>

						<div class="col-2 text-center">
							<button class="btn btn-danger eliminar"> <i class="fas fa-trash-alt"></i> </button>
						</div>

					</div>
				</template>

			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		
		<?php require_once 'Comunes/Footer.php'; ?>
		<script src="../App/js/calcular_notas.js"></script>

	</div>


</body>
</html>
