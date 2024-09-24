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
                                            <h5><i class="fa fa-pen-to-square"></i> EDITAR USUÁRIO</h5>
                                        </div>
                                        <div class="col-sm-5 text-right">    
                                            <a class="btn btn-warning btn-sm" href="<?=base_url('usuario')?>"><i class="fa-solid fa-arrow-left"></i> VOLTAR</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                  <form method="post" action="<?=base_url('usuario/alterar')?>">
                                    <div class="row">
                                      <div class="col-sm-3">
                                        <label for="name">CPF</label>
                                        <input type="text" class="form-control" value="<?=$result->cpf?>" name="cpf" readonly>
                                      </div>
                                      <div class="col-sm-5">
                                        <label for="name">Usuário</label>
                                        <input type="text" class="form-control" value="<?=$result->user?>" name="user" readonly>
                                      </div>
                                      <div class="col-sm-3">
                                        <label for="name">Nova senha</label>
                                        <input type="password" class="form-control" name="password" required>
                                      </div>
                                    </div>
                                   
                                    <div class="row mt-4 justify-content-right">
                                      <div class="col-sm-2">
                                        <button type="submit" class="btn btn-primary w-100">Alterar</button>
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