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
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <h5><i class="fa fa-plus-circle"></i> CADASTRAR PERFIL</h5>
                                        </div>
                                        <div class="col-sm-5 text-right">    
                                            <a class="btn btn-warning btn-sm" href="<?=base_url('perfil')?>"><i class="fa-solid fa-arrow-left"></i> VOLTAR</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                  <?=$this->include('template/message')?>
                                  <form action="<?=base_url('perfil/adicionar')?>" method="post">   
                                    <div class="row justify-content-center">
                                      <div class="col-sm-6">
                                          <div class="row">
                                            <div class="col-sm-4">
                                              <div class="form-group">
                                                <label for="Nome">Perfil</label>  
                                                  <input id="perfil" name="perfil" placeholder=""  class="form-control input-md"  type="text">
                                              </div>
                                            </div>
                                            <div class="col-sm-8">
                                              <div class="form-group">
                                                <label for="Nome">Descrição</label>  
                                                  <input id="descricao" name="descricao" placeholder="" required class="form-control input-md"  type="text">
                                              </div>
                                            </div>
                                          </div>
                                        <div class="row ml-0 mt-4">
                                            <label class="control-label" for="Cadastrar"></label>
                                            <button id="Cadastrar" name="Cadastrar" class="btn btn-primary btn-block" type="submit">Cadastrar</button>
                                        </div>
                                      </div>
                                    </div>
                                  </form>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
<?= $this->endSection() ?>
