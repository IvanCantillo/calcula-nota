<footer class="main-footer">
  <div class="row">
    <div class="col-8">
      <strong>Copyright &copy; <?= date("yy") ?> C.T.N. </strong> Todos los derechos reservados.
    </div>
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->


<!-- Modal -->
<div class="modal fade" id="cerrarSesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¡Importante!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Estas seguro que deseas salir de la aplicacion?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
        <a href="<?= url_base ?>Usuario/cerrar_sesion"  class="btn btn-danger">Aceptar</a>
      </div>
    </div>
  </div>
</div>

<?php require_once 'App/scripts.php'; ?>

