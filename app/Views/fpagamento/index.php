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
                <h5><i class="fa fa-plus-circle"></i> CADASTRO DE FORMAS DE PAGAMENTO</h5>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form action="<?= base_url('fpagamento/adicionar') ?>" method="post">
              <div class="row">
                <div class="col-sm-5">
                  <div class="form-group">
                    <label for="Nome">Descrição<h11>*</h11></label>
                    <input id="forma" name="descricao_fpagamento" placeholder="" class="form-control input-md" type="text" required>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <label for="Nome">Parcelas<h11>*</h11></label>
                    <input id="descricao" name="parcelas" placeholder="" required class="form-control input-md" type="number">
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <label for="Nome">Prazo (dias)<h11>*</h11></label>
                    <input id="descricao" name="tempo_pagamento" placeholder="" required class="form-control input-md" type="number">
                  </div>
                </div>
                <div class="row ml-0 mt-3">
                  <div class="form-group mt-3">
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
                <h5><i class="fa fa-list"></i> LISTA DE FORMAS DE PAGAMENTO</h5>
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
                  <th class="text-center">ID</th>
                  <th>Descrição</th>
                  <th>Parcelas</th>
                  <th>Prazo</th>
                  <th>Status</th>
                  <th class="text-center">Ação</th>
                </tr>
              </thead>
              <tbody id="tbody">
                <?php foreach ($results as $result): ?>
                  <tr>
                    <td class="text-center"><?= $result->id_fpagamento ?></td>
                    <td><?= $result->descricao_fpagamento ?></td>
                    <td><?= $result->parcelas ?></td>
                    <td><?= $result->tempo_pagamento ?></td>
                    <td><span class="badge badge <?= $result->status == 1 ? 'badge-success' : 'badge-warning' ?>"><?= $result->status == 1 ? 'ativo' : 'inativo' ?></span></td>
                    <td class="text-center">
                      <a href="#" onclick="excluir(<?= $result->id_fpagamento ?>,'fpagamento')" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa-solid fa-trash"></i></a>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function excluir(id) {
    if (confirm('Tem certeza que deseja excluir este item?')) {
      window.location = 'fpagamento/excluir/' + id;
    }
  }
</script>
<?= $this->endSection() ?>