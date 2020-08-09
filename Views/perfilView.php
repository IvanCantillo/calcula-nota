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
     <div class="row justify-content-center">

      <div class="col-6">
       <!-- Profile Image -->
       <div class="card card-primary card-outline">
        <div class="card-body box-profile">

         <div class="text-right">
          <a href="#"  id='actualizar_perfil' ><i class="text-primary fas fa-edit" title="Editar" ></i> Actualizar contraseña</a>

        </div>

        <div class="text-center">
          <img class="profile-user-img img-fluid img-circle"
          src="../App/Bootstrap/dist/img/<?= $_SESSION['usuario']['foto'] ?>"
          alt="User profile picture">
        </div>


        <h3 class="profile-username text-center"> <?= $resUsuario['nombres'] ." ". $resUsuario['apellidos'] ?> </h3>

        <ul class="list-group list-group-unbordered mb-3">

          <li class="list-group-item">

            <div class="row">
              <div class="col"> <b>Telefono</b> </div>
              <div class="col text-right"> <?= $resUsuario['telefono'] ?> </div>
            </div>

          </li>

          <li class="list-group-item">

            <div class="row">
              <div class="col"> <b>Genero</b> </div>
              <div class="col text-right"> <?= $resUsuario['genero'] ?> </div>
            </div>

          </li>
          <li class="list-group-item">

            <div class="row">
              <div class="col"> <b>Correo</b> </div>
              <div class="col text-right"> <?= $resUsuario['correo'] ?> </div>
            </div>

          </li>
        </ul>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>

</div><!-- /.container-fluid -->
</section>

<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once 'Comunes/Footer.php'; ?>
<script src="../App/js/actualizar_perfil.js" ></script>

</div>


</body>
</html>
