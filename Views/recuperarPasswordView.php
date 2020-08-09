<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Calcula Tu Nota | Recuperar contraseña </title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php require_once 'App/styles.php'; ?>

</head>
<body class="hold-transition login-page">
	<div class="login-box">

		<div class="login-logo">
			<b>¿Olvidaste tu contraseña?</b>
		</div>

		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg"> No te preocupes escribe tu correo y recibe un mensaje con tu contraseña.</p>

				<form id='form_recuperar_password' >
					<div class="input-group mb-3">
						<input type="email" class="form-control" placeholder="Correo" id="correo" name="correo" >
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="submit" id="btn_recuperar_password" class="btn btn-primary btn-block"> Recuperear contraseña </button>
						</div>
						<!-- /.col -->
					</div>
				</form>

				<p class="mt-3 mb-1">
					<a href="<?= url_base ?>Usuario/" class="text-center">Ya tengo una cuenta</a>
				</p>
				<p class="mb-0">
					¿Aún no tienes una cuenta? <a href="<?= url_base ?>Usuario/registro" class="text-center">Registrarte</a>
				</p>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->
	
	<?php require_once 'App/scripts.php'; ?>
	<script src="../App/js/recuperar_password.js"></script>
	
</body>
</html>
