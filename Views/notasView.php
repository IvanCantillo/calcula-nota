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
<body class="hold-transition sidebar-mini sidebar-collapse">
	<!-- Site wrapper -->
	<div class="wrapper">

		<!-- Navbar -->
		<?php require_once 'Comunes/Navbar.php'; ?>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<?php require_once 'Comunes/Menu.php'; ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Mis Notas</h1>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>

			<!-- Main content -->
			<section class="content">

				<!-- Default box -->
				<div class="card">
					
					<div class="card-body table-responsive">

						<table id="tabla_notas" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Materia</th>
									<th>Nota</th>
									<th align="center"> Opciones </th>
								</tr>
							</thead>
							<tbody>

								<?php $i=1; foreach ($resNotas as $dato): ?>

								<tr>
									<td> <p class="mt-1 text-center"> <?= $i++; ?> </p> </td>
									<td> <p class="mt-1 text-center"> <?= $dato['materia']; ?> </p> </td>
									<td> <p class="mt-1 text-center"> <?= $dato['nota']; ?> </p> </td>
									<td> 
										<a href="<?= $dato['id'] ?>" class="btn btn-primary ml-3 mt-1 btn-actualizar">
											<i class="fas fa-pencil-alt"></i>
										</a> 
										<a href="<?= $dato['id'] ?>" class="btn btn-danger ml-3 mt-1 btn-eliminar">
											<i class="fas fa-trash-alt"></i>
										</a> 
									</td>
								</tr>

							<?php endforeach; ?>

						</tbody>

					</table>

				</div>
				<!-- /.card-body -->

			</div>
			<!-- /.card -->

		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<?php require_once 'Comunes/Footer.php'; ?>

	<script type="text/javascript">
		$(function tabla () {
			$("#tabla_notas").DataTable();
		});
	</script>

	<script src="../App/js/notas.js"></script>

</div>


</body>
</html>
