<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Calcula Tu Nota | Iniciar sesion</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php require_once 'App/styles.php'; ?>

</head>

<body class="hold-transition login-page">

	<div class="login-box">
		<div class="login-logo">
			<b>¡Hola! Bienvenido</b>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Para ingresar inicia sesion</p>

				<form id="form_login">
					<div class="input-group mb-3">
						<input type="email" class="form-control" required placeholder="Correo" id="correo" name="correo">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" required placeholder="Contraseña" id="password" name="password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>

					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary btn-block" name="ingresar"> Ingresar </button>
					</div>

				</form>

				<p class="mb-1">
					<a href="<?= url_base ?>Usuario/recuperar_password">Olvide mi contraseña</a>
				</p>
				<p class="mb-0">
					¿Aún no tienes una cuenta? <a href="<?= url_base ?>Usuario/registro" class="text-center">Registrarte</a>
				</p>

				<!-- /.login-card-body -->
			</div>
		</div>
		<!-- /.login-box -->

		<?php require_once 'App/scripts.php'; ?>
		<script src="../App/js/inicio_sesion.js"></script>

	</body>
	</html>
