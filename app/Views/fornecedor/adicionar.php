<?= $this->extend('master') ?>

<?= $this->section('content') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <!-- Main content -->
            <div class="content">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-7">
                                <h5><i class="fa-solid fa-circle-plus"></i> CADASTRAR FORNECEDOR</h5>
                            </div>
                            <div class="col-sm-5 text-right">    
                                <a class="btn btn-warning btn-sm" href="<?=base_url('fornecedor')?>"><i class="fa-solid fa-arrow-left"></i> VOLTAR</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <form action="<?=base_url('fornecedor/adicionar')?>" method="post">          
                        <div class="row">
                          <div class="col-sm-3 mb-3">
                            <div class="form-group">
                              <label for="Nome">Nome Fantasia</label>  
                                <input  name="fantasia" placeholder="" required class="form-control input-md"  type="text">
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label for="Nome">CPF/CNPJ<h11></h11></label>  
                              <input  name="cpf_cnpj" placeholder="somente numeros" class="form-control input-md"  type="number">
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label for="Nome">Inscrição estadual<h11></h11></label>  
                              <input  name="cpf_cnpj" placeholder="somente numeros" class="form-control input-md"  type="number">
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label for="Nome">Inscrição municipal<h11></h11></label>  
                              <input  name="cpf_cnpj" placeholder="somente numeros" class="form-control input-md"  type="number">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="row ml-0 mt-2">
                            <div class="form-group">
                              <label class="control-label" for="Cadastrar"></label>
                              <button id="Cadastrar" name="Cadastrar" class="btn btn-primary" type="submit">Cadastrar</button>
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
<?= $this->endSection() ?>
