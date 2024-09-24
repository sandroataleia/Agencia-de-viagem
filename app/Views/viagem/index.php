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
                <h5><i class="fa fa-list"></i> STATUS DAS VIAGENS</h5>
              </div>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-striped" id="datatable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Ida/volta</th>
                  <th>Cliente</th>
                  <th>Embarque</th>
                  <th>Data/hora viagem</th>
                  <th>Tempo de viagem</th>
                  <th>Origem</th>
                  <th>Destino</th>
                  <th>Escala</th>
                  <th>Status</th>
                </tr>
              <tbody id="tbody">
                <?php 
                  date_default_timezone_set('America/Sao_Paulo');
                  foreach ($results as $result):
                    $status = 'finalizado';
                    $badge = 'badge-success';
  
                    if ($result->motivo_cancelamento == !null) {
                      $status = 'Cancelado';
                      $badge = 'badge-dark';
                    } elseif ($result->data_viagem >= date('Y-m-d') && strtotime($result->hora_embarque) > time()) {
                      $status = 'Aguardando';
                      $badge = 'badge-danger';
                    } elseif ($result->data_viagem == date('Y-m-d') && strtotime($result->hora_embarque) <= time() && strtotime($result->hora_viagem) > time()) {
                      $status = 'Embarcando';
                      $badge = 'badge-warning';
                    } elseif ($result->data_viagem == date('Y-m-d') && strtotime($result->hora_viagem) <= time() && time() <  strtotime(date('H:i:s', strtotime($result->hora_viagem) + strtotime($result->tempo_voo) - 10800))) {
                      $status = 'Viajando';
                      $badge = 'badge-info';
                    }
                ?>
                  <tr style="cursor: pointer;" onclick="ver()">
                    <td><?= $result->id_venda ?></td>
                    <td><?= $result->tipo_viagem == 'i' ? 'Ida' : 'Volta' ?></td>
                    <td><?= $result->nome?></td>
                    <td><?= $result->hora_embarque ?></td>
                    <td><?= date('d/m/Y', strtotime($result->data_viagem)) ?> <?= $result->hora_viagem ?></td>
                    <td><?= $result->tempo_voo ?> </td>
                    <td><?= $result->origem ?></td>
                    <td><?= $result->destino ?></td>
                    <td><?= $result->local_escala ?></td>
                    <td><span class="badge <?=$badge?>"><?= $status ?></span></td>
                    
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
  function ver(id){
    console.log(id);
   // url = "http://localhost/vendas/viagem/visualizar/"+id;
    //window.location = url;
  }
  // $("#linha_clicavel").click(function() {
  //   alert($(this).data("href"));
  //   window.location = $(this).data("href");
  // });
</script>
<?= $this->include('viagem/modalCancelar') ?>
<?= $this->endSection() ?>