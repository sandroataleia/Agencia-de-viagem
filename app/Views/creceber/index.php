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
                <h5><i class="fa fa-plus-circle"></i> LISTA DE CONTAS A RECEBER</h5>
              </div>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-striped table-responsive" id="datatable">
              <thead>
                <tr>
                  <th>CPF</th>
                  <th>Nome</th>
                  <th>Data emissão</th>
                  <th>Data vencimento</th>
                  <th>Data pagamento</th>
                  <th>Valor original</th>
                  <th>Valor Aberto</th>
                  <th>Valor pago</th>
                  <th>Situação</th>
                  <th class="text-center">Ação</th>
                </tr>
              <tbody id="tbody">
                <?php
                $situacao   = null;
                $badge      = null;
                foreach ($results as $result):
                  if (strtotime($result->data_vencimento) > strtotime(date('Y-m-d')) && $result->situacao == 0) {
                    $situacao    = "A vencer";
                    $badge = "bg-warning";
                  } else if ($result->situacao == 1) {
                    $badge = "bg-success";
                    $situacao   = "Liquidado";
                  }else if(strtotime($result->data_vencimento) < strtotime(date('Y-m-d')) && $result->situacao == 0) {
                    $badge = "bg-danger";
                    $situacao   = "Vencido";
                  }    
                ?>
                  <tr>
                    <td><?= $result->cpf ?></td>
                    <td><?= $result->nome ?></td>
                    <td><?= date('d/m/Y',strtotime($result->data_lancamento)) ?></td>
                    <td><?= date('d/m/Y',strtotime($result->data_vencimento)) ?></td>
                    <td><?=strtotime($result->data_pagamento) == null ? '' : date('d/m/Y',strtotime($result->data_pagamento)) ?></td>
                    <td>R$ <?= $result->valor_original ?></td>
                    <td>R$ <?= $result->valor_aberto ?></td>
                    <td>R$ <?= $result->valor_pago ?></td>
                    <td><span class="badge <?= $badge ?>"><?= $situacao ?></span></td>
                    <td class="text-center">
                      <a href="<?= base_url('financas/creceber/baixa/' . $result->id_creceber) ?>" title="Baixar" class="btn btn-outline-primary btn-sm <?= $result->situacao == '1' ? 'd-none' : '' ?>"><i class="fa-solid fa-arrow-down"></i></a>
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
<?= $this->endSection() ?>