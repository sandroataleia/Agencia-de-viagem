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
                              <input  name="inscricao_estadual" placeholder="somente numeros" class="form-control input-md"  type="number">
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label for="Nome">Inscrição municipal<h11></h11></label>  
                              <input  name="inscricao_municipal" placeholder="somente numeros" class="form-control input-md"  type="number">
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
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-7">
                                <h5><i class="fa fa-list"></i>  LISTA DE FORNECEDORES</h5>
                            </div>
                            <div class="col-sm-5 text-right">
                                <a class="btn btn-warning btn-sm" href=""><i class="fa fa-filter"></i> FILTRAR</a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-body"> 
                        <table class="table table-striped" id="datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fantasia</th>
                                    <th>CPF/CNPJ</th>
                                    <th>Inscrição estadual</th>
                                    <th>Inscricao municipal</th>
                                    <th>Status</th>
                                    <th class="text-center">Ação</th>
                                </tr>
                                <tbody id="tbody">
                                    <?php foreach($results as $result):?>
                                    <tr>
                                        <td class="text-center"><?=$result->id_fornecedor?></td>
                                        <td><?=$result->fantasia?></td>
                                        <td><?=$result->cpf_cnpj?></td>
                                        <td><?=$result->inscricao_estadual?></td>
                                        <td><?=$result->inscricao_municipal?></td>
                                        <td><span class="badge <?=$result->status == 1 ? 'bg-success' : 'bg-danger'?> rounded-pill"><?=$result->status == 1 ? 'ativo' : 'inativo'?> </span></td>
                                        <td class="text-center">
                                            <a href="#" onclick="excluir(<?=$result->id_fornecedor?>,'fornecedor')" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach?>
                                </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
<?= $this->endSection() ?>

