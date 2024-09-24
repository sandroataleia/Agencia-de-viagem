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
            <h5><i class="fa fa-plus-circle"></i> CADASTRO DE BANCO - CONTA INTERNA</h5>
          </div>
          <div class="card-body">
            <div class="card-body">
              <form method="post" action="<?= base_url('banco/adicionar') ?>">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="Nome">Banco</label>
                      <input id="nome" name="nome" class="form-control input-md" type="text" required>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="Nome">Código</label>
                      <input id="codigo" name="codigo" class="form-control input-md" type="text" required>
                    </div>
                  </div>
                  <div class="row mb-0 mt-3">
                    <div class="form-group mt-3 ml-2">
                      <label class="control-label" for="Cadastrar"></label>
                      <button id="Cadastrar" name="Cadastrar" class="btn btn-primary" type="submit">Cadastrar</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h5><i class="fa fa-list"></i> LISTA DE BANCOS</h5>
          </div>
          <div class="card-body">
            <table class="table" id="datatable">
              <thead>
                <tr>
                  <th class="text-center">ID</th>
                  <th>Nome</th>
                  <th>Código</th>
                  <th>Situação</th>
                  <th class="text-center">Ação</th>
                </tr>
              <tbody id="tbody">
                <?php foreach ($results as $result): ?>
                  <tr>
                    <td class="text-center"><?= $result->id_banco ?></td>
                    <td><?= $result->nome ?></td>
                    <td><?= $result->codigo ?></td>
                    <td><span class="badge <?= $result->status == 1 ? 'bg-success' : 'bg-danger' ?> rounded-pill"><?= $result->status == 1 ? 'ativo' : 'inativo' ?></span></td>
                    <td class="text-center">
                      <a href="#" onclick="excluir(<?= $result->id_banco ?>,'banco')" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa-solid fa-trash"></i></a>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  const excluir = (id) => {
    if (confirm('Tem certeza que deseja excluir este item?')) {
      window.location = 'banco/excluir/' + id;
    }
  }

</script>
<?= $this->endSection() ?>