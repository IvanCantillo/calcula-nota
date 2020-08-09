<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Calcula Tu Nota | Registration Page</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php require_once 'App/styles.php'; ?>

</head>
<body class="hold-transition register-page">
	<div class="register-box">
		<div class="register-logo">
			<b> ¡Hola! bienvenido </b>
		</div>

		<div class="card">
			<div class="card-body register-card-body">
				<p class="login-box-msg"> Registrate para poder ingresar </p>

				<form id="form_registro">
					<div class="row">

						<div class="input-group mb-3 col">
							<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombres">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-user"></span>
								</div>
							</div>
						</div>
						<div class="input-group mb-3 col">
							<input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellidos">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-user"></span>
								</div>
							</div>
						</div>

					</div>

					<div class="row">

						<div class="form-group mb-3 col">

							<select name="genero" class="form-control" id="genero">
								<option value="3"> Genero </option>
								<option value="1"> Masculino </option>
								<option value="2"> Femenino </option>>
							</select>

						</div>

						<div class="input-group mb-3 col">
							<input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-phone"></span>
								</div>
							</div>
						</div>

					</div>
					
					<div class="input-group mb-3">
						<input type="email" class="form-control" id="correo" name="correo" placeholder="Correo">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>

					<div class="row">

						<div class="input-group mb-3 col">
							<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-lock"></span>
								</div>
							</div>
						</div>
						<div class="input-group mb-3 col">
							<input type="password" class="form-control" id="password-confirm" name="password-confirm" placeholder="Repetir">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-lock"></span>
								</div>
							</div>
						</div>

					</div>

					
					<div class="form-group text-right">
						<button type="submit" name="enviar" id="enviar" class="btn btn-primary btn-block">Registrarse</button>
						<!-- /.col -->
					</div>
				</form>

				<a href="<?= url_base ?>Usuario/" class="text-center">Ya tengo una cuenta</a>
			</div>
			<!-- /.form-box -->
		</div><!-- /.card -->
	</div>
	<!-- /.register-box -->

	<?php require_once 'App/scripts.php'; ?>
	<script src="../App/js/registro_usuario.js"></script>

</body>
</html>
