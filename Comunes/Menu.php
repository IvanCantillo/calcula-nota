<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <a href="<?= url_base ?>Usuario/perfil" title="Perfil">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../App/Bootstrap/dist/img/<?= $_SESSION['usuario']['foto'] ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <span class="d-block text-light"><?= $_SESSION['usuario']['nombre']; ?></span>
        </div>
      </div>
    </a>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
             <a href="<?= url_base ?>Notas/" class="nav-link">
               <i class="nav-icon fas fa-home"></i>
               <p>
                 Inicio
               </p>
             </a>
           </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Opciones
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= url_base ?>Notas/mis_notas" class="nav-link">
                  <i class="fas fa-address-book nav-icon"></i>
                  <p>Mis Notas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= url_base ?>Notas/calcular" class="nav-link">
                  <i class="fas fa-calculator nav-icon"></i>
                  <p>Calcular Notas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" data-toggle="modal" data-target="#cerrarSesion" href="">
             <i class="nav-icon fas fa-sign-out-alt"></i>
             <p>
               Cerrar sesion
             </p>
           </a>
         </li>
       </ul>
       
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>