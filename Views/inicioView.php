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
							<h1>Inicio</h1>
						</div>
					</div>
					<!-- Info boxes -->
					<div class="row">
						

						<!-- fix for small devices only -->
						<div class="clearfix hidden-md-up"></div>

						<div class="col-12 col-sm-6 col-md-6">
							<div class="info-box mb-3">
								<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-book"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Materias registradas</span>
									<span class="info-box-number"> <?= $resNotas['cantidad'] ?> </span>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->
						<div class="col-12 col-sm-6 col-md-6">
							<div class="info-box mb-3">

								<?php if( $resDatos['nota'] > 0): ?>

									<span class="info-box-icon <?=  $resDatos['bg'] ?> elevation-1"><i class="far <?= $resDatos['emoji'] ?>"></i></span>

									<div class="info-box-content">

										<span class="info-box-text">Promedio de todas las notas</span>
										<span class="info-box-number"> <?= $resDatos['nota'] ?> </span>

									</div>
									<!-- /.info-box-content -->
									<?php else: ?>

										<span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-question"></i></i></span>

										<div class="info-box-content">

											<span class="info-box-text">Promedio de todas las notas</span>
											<span class="info-box-number"> No hay notas para sacar porcentaje. </span>

										</div>

									<?php endif; ?>
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div><!-- /.container-fluid -->
				</section>

				<!-- Main content -->
				<section class="content">
					<div class="container-fluid">

						<div class="card">

							<div class="card-header">
								<h3 class="card-title">
									<span class="text h3">
										<i class="fas fa-clipboard-list"></i>
										Lista de tareas
									</span>
								</h3>
							</div>

							<!-- /.card-header -->
							<div class="card-body overflow-auto" style="height: 200px">
								<ul class="todo-list" data-widget="todo-list">

									<?php if ( $resTareas->rowCount() > 0): ?>

										<?php foreach ($resTareas as $tarea): ?>

											<li>

												<!-- checkbox -->
												<div  class="icheck-primary d-inline ml-2">

													<input type="checkbox" value="<?= $tarea['id'] ?>" name="todo" id="todoCheck<?= $tarea['id'] ?>" class="check_tarea" <?= ( $tarea['estado'] == 0 ) ?  'checked' : null ?> >
													<label for="todoCheck<?= $tarea['id'] ?>"></label>

												</div>
												<!-- todo text -->
												<span class="text"> <?= $tarea['mensaje'] ?> </span>

									<!-- Hora de la creacion
										<small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
									-->

									<div class="tools">

										<i class="text-primary fas fa-edit actulizar_tarea" id="<?= $tarea['id'] ?>" ></i>
										<i class="fas fa-trash-alt eliminar_tarea" id="<?= $tarea['id'] ?>"></i>

									</div>

								</li>

							<?php endforeach; ?>

							<?php else: ?>

								<li class="text-center">
									<span class="text h3">No hay tarea pendientes <i class="far fa-laugh-beam"></i> </span>
								</li>

							<?php endif; ?>



						</ul>
					</div>
					<!-- /.card-body -->
					
					<div class="card-footer clearfix">
						<button type="button" class="btn btn-info float-right" id="btn-agregar-tarea"><i class="fas fa-plus"></i> Agregar tarea</button>
					</div>

				</div>
			</div>

		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<?php require_once 'Comunes/Footer.php'; ?>
	<script src="../App/js/tareas.js" ></script>

</div>


</body>
</html>
