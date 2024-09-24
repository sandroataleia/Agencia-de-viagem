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
                <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-plus"></i> 
                  NOVA VENDA
                </a>
                <div class="dropdown-menu dropdown-menu-left" style="min-width: 5px !important;" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item text-grey-dark" href="<?=base_url('vendas/aluguel_carro/formulario_adicionar')?>">Aluguel de carro</a>
                  <a class="dropdown-item text-grey-dark" href="<?=base_url('vendas/aluguel_hotel/formulario_adicionar')?>">Aluguel quarto hotel</a>
                  <a class="dropdown-item text-grey-dark" href="<?=base_url('vendas/cruzeiro/formulario_adicionar')?>">Cruzeiro</a>
                  <a class="dropdown-item text-grey-dark" href="<?=base_url('vendas/viagem/formulario_adicionar')?>">Viagem</a>
                  <a class="dropdown-item text-grey-dark" href="<?=base_url('vendas/passaporte/formulario_adicionar')?>">Passaporte</a>
                  <a class="dropdown-item text-grey-dark" href="<?=base_url('vendas/pb4/formulario_adicionar')?>">PB4</a>
                  <a class="dropdown-item text-grey-dark" href="<?=base_url('vendas/seguro_viagem/formulario_adicionar')?>">Seguro Viagem</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-striped" id="datatable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th class="text-center">Tipo</th>
                  <th>Cliente</th>
                  <th>Data</th>
                  <th>Forma de pagamento</th>
                  <th>Valor líquido</th>
                </tr>
              <tbody id="tbody">
                <?php foreach ($results as $result):?>
                  <tr style="cursor: pointer;" onclick="ver()">
                    <td><?= $result->id_venda ?></td>
                    <td><?= $result->tipo_venda ?></td>
                    <td><?= $result->nome?></td>
                    <td><?= date('d/m/Y', strtotime($result->data_venda)) ?></td>
                    <td><?= $result->descricao_fpagamento ?></td>
                    <td>R$ <?= str_replace('.',',',$result->valor_liquido)?></td>
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