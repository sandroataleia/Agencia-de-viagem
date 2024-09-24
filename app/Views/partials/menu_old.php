<!-- sidebar menu start -->
<div class="sidebar-menu sticky-sidebar-menu">

<!-- logo start -->
<div class="logo">
  <h1><a href="<?=base_url('/')?>"></a></h1>
</div>

<!-- if logo is image enable this -->
<!-- image logo --
<div class="logo">
  <a href="index.html">
    <img src="" alt="Your logo" title="Your logo" class="img-fluid" style="height:35px;" />
  </a>
</div>
<!-- //image logo -->

<div class="logo-icon text-center">
  <a href="<?=base_url('/')?>" title="logo"><img src="<?=base_url('img/logo.png')?>" alt="logo-icon"> </a>
</div>
<!-- //logo end -->

<div class="sidebar-menu-inner">

  <!-- sidebar nav start -->
  <ul class="nav nav-pills nav-stacked custom-nav">
    <li class="<?=$menu_active == 'home' ? "active" : "";?>"><a href="<?=base_url('/')?>"><i class="fa fa-tachometer"></i><span> Dashboard</span></a>
    </li>
    <li class="<?=$menu_active == 'pessoa' ? "active" : "";?>"><a href="<?=base_url('pessoa')?>"><i class="fa fa-users"></i> <span>Pessoas</span></a></li>
    <li class="<?=$menu_active == 'cliente' ? "active" : "";?>"><a href="<?=base_url('cliente')?>"><i class="fa fa-user"></i> <span>Clienets</span></a></li>
    <li class="menu-list <?=$menu_active == 'viagem' ? "active" : "";?>">
      <a href="#"><i class="fa fa-plane"></i>
        <span>Viagens<i class="lnr lnr-chevron-right"></i></span></a>
      <ul class="sub-menu-list">
        <li><a href="<?=base_url('tviagem')?>">Tipo</a> </li>
        <li><a href="<?=base_url('viagem')?>">Viagens</a> </li>
        
      </ul>
    </li>
    <li class="menu-list <?=$menu_active == 'funcionario' ? "active" : "";?>">
      <a href="#"><i class="fa fa-address-card-o"></i>
        <span>Funcionarios<i class="lnr lnr-chevron-right"></i></span></a>
      <ul class="sub-menu-list">
        <li><a href="<?=base_url('cargo')?>">Cargo</a> </li>
        <li><a href="<?=base_url('funcionario')?>">Funcionarios</a> </li>
        
      </ul>
    </li>
    <li class="menu <?=$menu_active == 'crm' ? "active" : "";?>"><a href="forms.html"><i class="fa fa-bar-chart"></i> <span>CRM</span></a></li>
    <li class="menu-list">
      <a href="#"><i class="fa fa-balance-scale"></i>
        <span>Contábil<i class="lnr lnr-chevron-right"></i></span></a>
      <ul class="sub-menu-list">
        <li><a href="carousels.html">Conciliação bancária</a> </li>
        
      </ul>
    </li>
    <li class="menu-list <?=$menu_active == 'financeiro' ? "active" : "";?>">
      <a href="#"><i class="fa fa-dollar"></i>
        <span>Finanças<i class="lnr lnr-chevron-right"></i></span></a>
      <ul class="sub-menu-list">
        <li class="menu <?=$menu_active == 'financeiro' ? "active" : "";?>"><a href="<?=base_url('financeiro/fpagamento')?>">Formas de pagamento</a></li>
        <li class="menu <?=$menu_active == 'financeiro' ? "active" : "";?>"><a href="<?=base_url('financeiro/cpagamento')?>">Cond. de pagamento</a></li>
        <li class="menu <?=$menu_active == 'financeiro' ? "active" : "";?>"><a href="<?=base_url('financeiro/opcartoes')?>">Operadoras de cartão</a></li>
        <li class="menu <?=$menu_active == 'financeiro' ? "active" : "";?>"><a href="<?=base_url('financeiro/cpagar')?>">Contas a pagar</a> </li>
        
        <li class="menu <?=$menu_active == 'financeiro' ? "active" : "";?>"><a href="<?=base_url('financeiro/creceber')?>">Contas a receber</a></li>
      </ul>
    </li>
    <li class="menu <?=$menu_active == 'relatorio' ? "active" : "";?>"><a href="forms.html"><i class="fa fa-file-pdf-o"></i> <span>Relatórios</span></a></li>
    <li class="menu <?=$menu_active == 'configuracao' ? "active" : "";?>"><a href="forms.html"><i class="fa fa-cog"></i> <span>Configurações</span></a></li>
    <li class="menu <?=$menu_active == 'backup' ? "active" : "";?>"><a href="forms.html"><i class="fa fa-save"></i> <span>Backup</span></a></li>
    <li class="<?=$menu_active == "usuario" ? "active" : ""?>"><a href="<?=base_url('usuario')?>"><i class="fa fa-user-circle-o"></i> <span>Usuarios</span></a></li>
  </ul>
  <!-- //sidebar nav end -->
  <!-- toggle button start -->
  <a class="toggle-btn">
    <i class="fa fa-angle-double-left menu-collapsed__left"><span>Collapse Sidebar</span></i>
    <i class="fa fa-angle-double-right menu-collapsed__right"></i>
  </a>
  <!-- //toggle button end -->
</div>
</div>
<!-- //sidebar menu end -->