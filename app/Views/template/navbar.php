 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
       <!-- Notifications Dropdown Menu -->
       <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge" id="qtde_checkin"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"> Checkin hoje</span>
          <div class="dropdown-divider"></div>
          <div id="checkins">

          </div>
          
          
          <a href="<?=base_url('viagem')?>" class="dropdown-item dropdown-footer">Ver todos</a>
        </div>
      </li>

      <!-- EXPANDIR TELA -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link"  href="<?=base_url('logout')?>" >
          <h6>Sair <i class="fas fa-sign-out-alt"></i></h6>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->