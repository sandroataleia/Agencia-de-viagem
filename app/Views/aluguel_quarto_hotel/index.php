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
                    <h5><i class="fa fa-list"></i>  LISTA DE ALUGUEIS DE QUARTO DE HOTEL</h5>
                </div>
                <div class="col-sm-5 text-right">
                  <a class="btn btn-primary" href="<?=base_url('vendas/aluguel_quarto_hotel/formulario_cadastro')?>"><i class="fa fa-plus"></i> NOVO</a>
                </div>
              </div>
                        
            </div>
            <div class="card-body">
              <table class="table table-striped" id="datatable">
                <thead>
                  <tr>
                    <th class="text-center">ID</th>
                    <th>Cliente</th>
                    <th>Data Entrada</th>
                    <th>Data saída</th>
                    <th>Seguradora</th>
                    <th>Valor</th>
                    <th style="min-width: 100px;">Ação</th>
                  </tr>
                </thead>
                <tbody id="tbody">
                  <?php foreach($results as $result):?>
                    <tr>
                      <td class="text-center"><?=$result->id_aluguel_quarto_hotel?></td>
                      <td><?=$result->nome?></td>
                      <td><?=date('d/m/Y',strtotime($result->data_inicio))?></td>
                      <td><?=date('d/m/Y',strtotime($result->data_fim))?></td>
                      <td><?=$result->seguradora?></td>
                      <td>R$ <?=str_replace('.',',',$result->valor)?></td>
                      <td>
                        <a href="#" onclick="excluir(<?=$result->id_aluguel_quarto_hotel?>,'vendas/aluguel_quarto_hotel')" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa-solid fa-trash"></i></a>
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
<?= $this->endSection() ?>

