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
                                            <h5><i class="fa fa-plus-circle"></i> CADASTRAR USUÁRIO</h5>
                                        </div>
                                        <div class="col-sm-5 text-right">    
                                            <a class="btn btn-warning btn-sm" href="<?=base_url('usuario')?>"><i class="fa-solid fa-arrow-left"></i> VOLTAR</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                  <?=$this->include('template/message')?>
                                  <form method="post" action="<?=base_url('usuario/adicionar')?>">
                                    <div class="row">
                                      <div class="col-sm-3">
                                        <label for="name">CPF</label>
                                        <input type="text" class="form-control" name="cpf" required>
                                      </div>
                                      <div class="col-sm-6">
                                        <label for="name">Usuário</label>
                                        <input type="text" class="form-control" name="user" required>
                                      </div>
                                      <div class="col-sm-3">
                                        <label for="name">Senha</label>
                                        <input type="password" class="form-control" name="password" required>
                                      </div>
                                    </div>
                                    <div class="row mt-5">
                                      <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th>ID</th>
                                            <th>Página</th>
                                            <th>Descrição</th>
                                            <th>Selecionar</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach($perfis as $perfil):?>
                                            <tr>
                                              <td><?=$perfil->id_perfil?></td>
                                              <td><?=$perfil->perfil?></td>
                                              <td><?=$perfil->descricao?></td>
                                              <td><input type="checkbox" value="<?=$perfil->id_perfil?>" class="form-control" name="id_perfil_usuario[]"></td>
                                            </tr>
                                          <?php endforeach?>
                                        </tbody>
                                      </table>
                                    </div>
                                    <div class="row mt-4 justify-content-right">
                                      <div class="col-sm-2">
                                        <button type="submit" class="btn btn-primary w-100">Adicionar</button>
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