<?= $this->extend('master') ?>

<?= $this->section('content') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <?=$this->include('template/message.php')?>
            </div>
            <div class="row">  
              <div class="col-lg-2 col-6">
                <!-- CHECK IN-->
                <div class="small-box bg-info">
                  <div class="inner">
                  <h3>13<sup style="font-size: 20px"></sup></h3>
                    <p>Check-in (hoje)</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-plane"> </i>
                  </div>
                  <a href="<?=base_url('vendas')?>" class="small-box-footer">
                    Acessar <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div> 
              <!-- CHECK IN-->
              <div class="col-lg-2 col-6">
                <div class="small-box bg-primary">
                  <div class="inner">
                  <h3>15<sup style="font-size: 20px"></sup></h3>
                  <p class="stat-text">Check-in (amanhã)</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-plane"> </i>
                  </div>
                  <a href="<?=base_url('vendas')?>" class="small-box-footer">
                    Acessar <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div> 
              <!-- VOLTA FLEXIVEL-->
              <div class="col-lg-2 col-6">
                <div class="small-box bg-warning">
                  <div class="inner">
                  <h3>15<sup style="font-size: 20px"></sup></h3>
                  <p class="stat-text">Volta flexível</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-users"> </i>
                  </div>
                  <a href="<?=base_url('vendas')?>" class="small-box-footer">
                    Acessar <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div> 
              
              <!-- VOLTA CAUÇÃO-->
              <div class="col-lg-2 col-6">
                <div class="small-box bg-danger">
                  <div class="inner">
                  <h3>15<sup style="font-size: 20px"></sup></h3>
                  <p class="stat-text">Volta caução</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-users"> </i>
                  </div>
                  <a href="<?=base_url('vendas')?>" class="small-box-footer">
                    Acessar <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div> 
              <!-- SEGURO VIAGEM-->
              <div class="col-lg-2 col-6">
                <div class="small-box bg-indigo">
                  <div class="inner">
                  <h3>15<sup style="font-size: 20px"></sup></h3>
                  <p class="stat-text">Seguro viagem</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-users"> </i>
                  </div>
                  <a href="<?=base_url('vendas')?>" class="small-box-footer">
                    Acessar <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div> 
              <!-- CHECK-IN EM 4 HORAS-->
              <div class="col-lg-2 col-6">
                <div class="small-box bg-grey">
                  <div class="inner">
                  <h3>15<sup style="font-size: 20px"></sup></h3>
                  <p class="stat-text">Check-in em 4 horas</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-users"> </i>
                  </div>
                  <a href="<?=base_url('vendas')?>" class="small-box-footer">
                    Acessar <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>    
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="card">

                </div>
              </div>
              <div class="col-sm-6">
                <div class="card">
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>
