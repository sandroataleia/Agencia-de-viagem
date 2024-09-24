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
                <h5><i class="fa fa-list"></i> LISTA DE VENDAS</h5>
              </div>
              <div class="col-sm-5 text-right">
                <a class="btn btn-primary btn-sm" href="<?= base_url('vendas/formulario_cadastro') ?>">
                  <i class="fa fa-plus"></i> 
                  NOVA VENDA
                </a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-striped table-responsive w-100" id="datatable">
              <thead>
                <tr>
                  <th class="text-center">Tipo</th>
                  <th>Cliente</th>
                  <th>Embarque</th>
                  <th>Data/hora viagem</th>
                  <th>Tempo de viagem</th>
                  <th>Origem</th>
                  <th>Destino</th>
                  <th>Escala</th>
                  <th>Tipo</th>
                  <th>Status</th>
                  <th>Ação</th>
                </tr>
              <tbody id="tbody">
                <?php
                date_default_timezone_set('America/Sao_Paulo');
                foreach ($results as $result):
                  $status = 'finalizado';

                  if ($result->motivo_cancelamento == !null) {
                    $status = 'Cancelado';
                  } elseif ($result->data_viagem >= date('Y-m-d') && strtotime($result->hora_embarque) > time()) {
                    $status = 'Aguardando';
                  } elseif ($result->data_viagem == date('Y-m-d') && strtotime($result->hora_embarque) <= time() && strtotime($result->hora_viagem) > time()) {
                    $status = 'Embarcando';
                  } elseif ($result->data_viagem == date('Y-m-d') && strtotime($result->hora_viagem) <= time() && time() <  strtotime(date('H:i:s', strtotime($result->hora_viagem) + strtotime($result->tempo_voo) - 10800))) {
                    $status = 'Viajando';
                  }
                ?>
                  <tr>
                    <td class="text-center"><?= $result->id_viagem ?></td>
                    <td><?= $result->nome ?></td>
                    <td><?= $result->hora_embarque ?></td>
                    <td><?= date('d/m/Y', strtotime($result->data_viagem)) ?> <?= $result->hora_viagem ?></td>
                    <td><?= $result->tempo_voo ?> </td>
                    <td><?= $result->origem ?></td>
                    <td><?= $result->destino ?></td>
                    <td><?= $result->local_escala ?></td>
                    <td><?= $result->tipo_viagem == 'i' ? 'Ida' : 'Volta' ?></td>
                    <td><?= $status ?></td>
                    <td>
                      <div>
                        <a class="btn btn-default btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                        <div class="dropdown-menu dropdown-menu-left" style="min-width: 5px !important;" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item text-grey-dark" href="<?= base_url('vendas/viagem/visualizar/' . $result->id_viagem) ?>"><i class="fa fa-eye"></i> Abrir</a>
                          <button type="button" class="dropdown-item text-danger" data-toggle="modal" data-target="#modalCancelar" onclick="setDadosModal(<?= $result->id_viagem ?>)"><i class="fa-regular fa-circle-xmark"></i> Cancelar</button>
                        </div>
                      </div>
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
  const setDadosModal = (valor) => {
    $("#id_venda_cancelar").val(valor);
  }
</script>
<?= $this->include('venda/modalCancelar') ?>
<?= $this->endSection() ?>