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
                  <h5><i class="fa fa-plus-circle"></i> CADASTRAR PARCEIRO</h5>
                </div>
                <div class="col-sm-5 text-right">    
                  <a class="btn btn-warning btn-sm" href="<?=base_url('parceiro')?>"><i class="fa-solid fa-arrow-left"></i> VOLTAR</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <?=$this->include('template/message')?>
              <form action="<?=base_url('parceiro/adicionar')?>"  method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-6 mb-1">
                    <div class="form-group">
                      <label for="Nome">Nome <h11></h11></label>  
                        <input name="fk_usuario" value="<?=session('id')?>"  type="hidden">
                        <input id="Nome" name="nome" placeholder="nome completo" required class="form-control input-md"  type="text">
                    </div>
                  </div>
                  <div class="col-sm-6 mb-1">
                    <div class="form-group">
                      <label for="Nome">CPF <h11></h11></label>  
                        <input name="cpf" placeholder="apenas números" class="form-control input-md"  type="number" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="Nome">RG <h11></h11></label>  
                        <input id="rg" name="rg" placeholder="" class="form-control input-md"  type="text">
                    </div>
                  </div>
                  <div class="col-sm-6 mb-1">
                    <div class="form-group">
                      <label for="prependedtext">Telefone <h11></h11></label>
                      <label class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></label>
                      <input name="telefone" class="form-control" type="text" maxlength="13" >
                    </div>
                  </div>
                </div>
                <div class="row ml-0 mt-2">
                  <div class="form-group">
                    <label class="control-label" for="Cadastrar"></label>
                    <button id="Cadastrar" name="Cadastrar" class="btn btn-primary" type="submit">Cadastrar</button>
                  </div>
                </div>
              </form> 
            </div> 
        </div> 
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-sm-7">
                <h5><i class="fa fa-list"></i> LISTA PARCEIROS</h5>
              </div>
              <div class="col-sm-5 text-right">
                <a class="btn btn-warning btn-sm" href=""><i class="fa fa-filter"></i> FILTRAR</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-hover" id="datatable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Contato</th>
                  <th>CPF</th>
                  <th>Status</th>
                  <th class="text-center">Ação</th>
                </tr>
                </thead>
                <tbody id="tbody">
                    <?php foreach($results as $result):?>
                    <tr>
                        <td class="text-center"><?=$result->id_parceiros?></td>
                        <td ><?=$result->nome?></td>
                        <td><?=$result->telefone?></td>
                        <td><?=$result->cpf?></td>
                        <td><span class="badge <?=$result->status == 1 ? 'bg-success' : 'bg-danger'?> rounded-pill"><?=$result->status == 1 ? 'ativo' : 'inativo'?></span></td>
                        <td class="text-center" style="width: 120px;">
                        
                          <a href="#" onclick="excluir(<?=$result->id_parceiros?>,'parceiro')" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>      
        </div> 
      </div>
    </div>   
  </div>
<script>
  const verParceiro = (id) => {
    window.location = 'parceiro/verParceiro/'+id
  }
</script>
<?= $this->endSection() ?>

