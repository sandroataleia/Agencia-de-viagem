<div class="leftside-menu">
  <!-- LOGO -->
  <a href="<?= base_url('/') ?>" class="logo text-center logo-light">
    <span class="logo-lg">
      <img src="<?= base_url('img/logo.png') ?>" alt="" height="16">
    </span>
    <span class="logo-sm">
      <img src="<?= base_url('img/logo.png') ?>" alt="" height="60">
    </span>
  </a>
  <div class="h-20" id="leftside-menu-container" data-simplebar>

    <!--- Sidemenu -->
    <ul class="side-nav">
      <li class="side-nav-item <?= $menu_active == 'home' ? "active" : ""; ?>">
        <a href="<?= base_url('/') ?>" class="side-nav-link">
          <i class="uil-home-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="side-nav-item <?= $menu_active == 'cliente' ? "active" : ""; ?>">
        <a href="<?= base_url('cliente') ?>" class="side-nav-link">
          <i class="uil-users-alt"></i>
          <span>Clientes</span>
        </a>
      </li>

      <!-- <li class="side-nav-item <?= $menu_active == 'cliente' ? "active" : ""; ?>">
                <a data-bs-toggle="collapse" href="#sidebarcliente" aria-expanded="false" aria-controls="sidebarCrm" class="side-nav-link">
                    <i class="uil-users-alt"></i>
                    <span>Clientes</span>
                </a>
                <div class="collapse" id="sidebarcliente">
                    <ul class="side-nav-second-level">
                        <li><a href="<?= base_url('tviagem') ?>">Clientes</a> </li>
                        <li><a href="<?= base_url('viagem') ?>">D</a> </li>
                    </ul>
                </div>
            </li> -->

      <li class="side-nav-item <?= $menu_active == 'viagem' ? "active" : ""; ?>">
        <a data-bs-toggle="collapse" href="#sidebarviagem" aria-expanded="false" aria-controls="sidebarCrm" class="side-nav-link">
          <i class="uil uil-plane-departure"></i>
          <span>Viagem</span>
        </a>
        <div class="collapse" id="sidebarviagem">
          <ul class="side-nav-second-level">
            <li><a href="<?= base_url('tviagem') ?>">Tipo</a> </li>
            <li><a href="<?= base_url('viagem') ?>">Viagens</a> </li>
          </ul>
        </div>
      </li>
      <li class="side-nav-item <?= $menu_active == 'funcionario' ? "active" : ""; ?>">
        <a data-bs-toggle="collapse" href="#sidebarfuncionario" aria-expanded="false" aria-controls="sidebarCrm" class="side-nav-link">
          <i class="uil uil-user-square"></i>
          <span>Funcionário</span>
        </a>
        <div class="collapse" id="sidebarfuncionario">
          <ul class="side-nav-second-level">
            <li><a href="<?= base_url('cargo') ?>">Setor</a> </li>
            <li><a href="<?= base_url('funcionario') ?>">Funcionários</a> </li>
          </ul>
        </div>
      </li>
      <li class="side-nav-item <?= $menu_active == 'kanban' ? "active" : ""; ?>">
        <a href="<?= base_url('kanban') ?>" class="side-nav-link">
          <i class="uil-sliders-v"></i>
          <span>Kanban</span>
        </a>
      </li>
      <li class="side-nav-item <?= $menu_active == 'funcionario' ? "active" : ""; ?>">
        <a data-bs-toggle="collapse" href="#sidebarcontabil" aria-expanded="false" aria-controls="sidebarCrm" class="side-nav-link">
          <i class="uil uil-balance-scale"></i>
          <span>Contábil</span>
        </a>
        <div class="collapse" id="sidebarcontabil">
          <ul class="side-nav-second-level">
            <li><a href="<?= base_url('cBancaria') ?>">Conciliação bancária</a> </li>
          </ul>
        </div>
      </li>
      <li class="side-nav-item <?= $menu_active == 'financeiro' ? "active" : ""; ?>">
        <a data-bs-toggle="collapse" href="#sidebarfinanceiro" aria-expanded="false" aria-controls="sidebarCrm" class="side-nav-link">
          <i class="uil uil-dollar-sign-alt"></i>
          <span>Finanças</span>
        </a>
        <div class="collapse" id="sidebarfinanceiro">
          <ul class="side-nav-second-level">
            <li><a href="<?= base_url('financeiro/banco') ?>">Bancos</a> </li>
            <li><a href="<?= base_url('financeiro/agencia') ?>">Agencia</a> </li>
            <li><a href="<?= base_url('financeiro/conta') ?>">Contas</a> </li>
            <li><a href="<?= base_url('financeiro/tipo_conta') ?>">Tipos de conta</a> </li>
            <li><a href="<?= base_url('financeiro/cpagar') ?>">Contas a pagar</a> </li>
            <li><a href="<?= base_url('financeiro/creceber') ?>">Contas a receber</a></li>
          </ul>
        </div>
      </li>

      <li class="side-nav-item <?= $menu_active == 'relatorio' ? "active" : ""; ?>">
        <a href="forms.html" class="side-nav-link">
          <i class="uil uil-file-download"></i>
          <span>Relatórios</span>
        </a>
      </li>
      <li class="side-nav-item <?= $menu_active == 'configuracao' ? "active" : ""; ?>">
        <a href="forms.html" class="side-nav-link">
          <i class="uil uil-cog"></i>
          <span>Configurações</span>
        </a>
      </li>
      <li class="side-nav-item <?= $menu_active == 'backup' ? "active" : ""; ?>">
        <a href="forms.html" class="side-nav-link">
          <i class="uil uil-folder-download"></i>
          <span>Backup</span>
        </a>
      </li>
    </ul>
    <!-- End Sidebar -->
    <div class="clearfix"></div>
  </div>
  <!-- Sidebar -left -->
</div>