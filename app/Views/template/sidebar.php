<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-lightblue elevation-1">
  <!-- Brand Logo -->
  <a href="<?= base_url('/') ?>" class="brand-link">
    <img src="<?= base_url('images/' . $empresa->logo) ?>" class="img-fluid img-logo">
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-4">
      <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <!-- HOME -->
        <li class="nav-item">
          <a href="<?= base_url('/') ?>" class="nav-link <?= $menu_active == 'home' ? 'active' : '' ?>">
            <i class="fa-solid fa-house"></i>
            <p>
              Home
            </p>
          </a>
        </li>
        <!-- CADASTROS -->
        <li class="nav-item <?= $menu_active == 'cadastro' ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= $menu_active == 'cadastro' ? 'active' : '' ?>">
            <i class="fa-solid fa-file-circle-plus"></i>
            <p>
              Cadastros
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview ">
            <li class="nav-item">
              <a href="<?= base_url('cliente') ?>" class="nav-link <?= $submenu_active == 'cliente' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Cliente</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('fornecedor') ?>" class="nav-link <?= $submenu_active == 'fornecedor' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Fornecedor</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('parceiro') ?>" class="nav-link <?= $submenu_active == 'parceiro' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Parceiro</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('funcionario') ?>" class="nav-link <?= $submenu_active == 'funcionario' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Funcionário</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('fpagamento') ?>" class="nav-link <?= $submenu_active == 'fpagamento' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Forma de pagamento</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('banco') ?>" class="nav-link <?= $submenu_active == 'banco' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Banco</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('agencia') ?>" class="nav-link <?= $submenu_active == 'agencia' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Agência</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('conta') ?>" class="nav-link <?= $submenu_active == 'conta' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Conta</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- VENDAS -->
        <li class="nav-item">
          <a href="<?= base_url('vendas') ?>" class="nav-link <?= $menu_active == 'vendas' ? 'active' : '' ?>">
            <i class="fa-solid fa-cart-shopping"></i>
            <p>
              Vendas
            </p>
          </a>
        </li>

         <!-- VIAGENS -->
         <li class="nav-item">
          <a href="<?= base_url('viagem') ?>" class="nav-link <?= $menu_active == 'viagens' ? 'active' : '' ?>">
            <i class="fa fa-plane"></i>
            <p>
              Status viagens
            </p>
          </a>
        </li>

        <!-- FINANÇAS -->
        <li class="nav-item <?= $menu_active == 'financas' ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= $menu_active == 'financas' ? 'active' : '' ?>">
            <i class="fa-solid fa-dollar"></i>
            <p>
              Finanças
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview ">
            <li class="nav-item">
              <a href="<?= base_url('financas/saldo_conta') ?>" class="nav-link <?= $submenu_active == 'saldo' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Saldo contas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('financas/cpagar') ?>" class="nav-link <?= $submenu_active == 'cpagar' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Contas a pagar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('financas/creceber') ?>" class="nav-link <?= $submenu_active == 'creceber' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Contas a receber</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('financas/entrada_saida') ?>" class="nav-link <?= $submenu_active == 'entradas_saidas' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Movimentações</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('financas/fluxo_caixa') ?>" class="nav-link <?= $submenu_active == 'fluxo_caixa' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Fluxo de caixa</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- CONTABIL -->
        <li class="nav-item <?= $menu_active == 'contabil' ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= $menu_active == 'contabil' ? 'active' : '' ?>">
            <i class="fa-solid fa-balance-scale"></i>
            <p>
              Contábil
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview ">
            <li class="nav-item">
              <a href="#" data-toggle="modal" data-target="#modalArquivo" class="nav-link <?= $submenu_active == 'conciliacao' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Conciliação bancária</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- USUARIOS-->
        <li class="nav-item">
          <a href="<?= base_url('usuario') ?>" class="nav-link <?= $menu_active == 'usuario' ? 'active' : '' ?>">
            <i class="fa-solid fa-users"></i>
            <p>
              Usuário
            </p>
          </a>
        </li>

        <!-- Configurações -->
        <li class="nav-item">
          <a href="#" class="nav-link <?= $menu_active == 'configuracao' ? 'active' : '' ?>">
            <i class="fa-solid fa-screwdriver-wrench"></i>
            <p>
              Configurações
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview ">
            <li class="nav-item">
              <a href="<?= base_url('empresa') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Empresa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('producao/insumo') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p></p>
              </a>
            </li>
          </ul>
        </li>
        <!-- RELATÓRIOS -->
        <li class="nav-item <?= $menu_active == 'relatorio' ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= $menu_active == 'relatorio' ? 'active' : '' ?>">
            <i class="fa-solid fa-file-lines"></i>
            <p>
              Relatórios
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview ">
            <p><strong>Financeiro</strong></p>
            <li class="nav-item">
              <a href="<?= base_url('relatorio/comissao/vendedor') ?>" class="nav-link <?= $submenu_active == 'comissao_vendedor' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Comissão Vendedor</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('relatorio/comissao/parceiro') ?>" class="nav-link <?= $submenu_active == 'comissao_parceiro' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Comissão parceiro</p>
              </a>
            </li>
            <p><strong>Vendas</strong></p>
            <li class="nav-item">
              <a href="<?= base_url('vendas/pedido') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Pedido</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('vendas/pedido') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Pedido</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('vendas/pedido') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Pedido</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('vendas/pedido') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Pedido</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('vendas/pedido') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Pedido</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<?=$this->include('conciliacao/modalArquivo')?>