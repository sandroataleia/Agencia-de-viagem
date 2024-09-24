<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <!-- Main content -->
      <div class="content">
        <?= $this->include('template/message') ?>
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-sm-7">
                <h5><i class="fa-solid fa-file-pdf"></i> GERAR RELATÓRIO DE COMISSÃO POR PARCEIRO</h5>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="post" action="<?= base_url('relatorio/comissao/relatorio_parceiro') ?>">
              <div class="row">
                <div class="col-sm-6 mb-3">
                  <label>Parceiro</label>
                  <select class="form-control" id="select2" name="cpf" required>
                    <?php foreach($parceiros as $parceiro):?>
                      <option value="<?=$parceiro->cpf?>"><?=$parceiro->nome?></option>
                    <?php endforeach?>
                    </select>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="Nome">Comissão (%)</label>
                    <input id="nome" name="comissao" class="form-control input-md" type="number" value="5">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="Nome">Data inicial</label>
                    <input id="nome" name="data_inicial" class="form-control input-md" type="date" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="Nome">Data final</label>
                    <input id="valor" name="data_final" class="form-control input-md" type="date" required>
                  </div>
                </div>
              </div>
              <div class="row ml-0 mt-3">
                <div class="col-sm-12 text-right">
                  <button id="Cadastrar" name="Cadastrar" class="btn btn-primary" type="submit">Gerar relatório</button>
                </div>
              </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>