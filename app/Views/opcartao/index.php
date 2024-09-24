<?= $this->extend('master') ?>

<?= $this->section('content') ?>
   <!-- main content start -->
<div class="main-content">

<div class="container-fluid content-top-gap">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb my-breadcrumb">
      <li class="breadcrumb-item"><a href="<?=base_url('/')?>">Home</a></li>
      <li class="breadcrumb-item">Financeiro</a>
      <li class="breadcrumb-item active" aria-current="page">Operadoras de cartões</li>
    </ol>
  </nav>
  <div class="container-fluid">
    <?=$this->include('partials/message.php')?>
    <div class="card">
        <div class="card-header">
            <a href="<?=base_url('financeiro/opcartoes/formCad')?>" class="btn btn-primary">
            <i class="mdi mdi-plus-circle me-2"></i> Adicionar 
            </a>
        </div>
        <div class="card-body">
        <table class="table table-striped" id="datatable">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th>Operadora</th>
                    <th>CNPJ</th>
                    <th class="text-center">Dias repasse</th>
                    <th>Status</th>
                    <th class="text-center">Ação</th>
                </tr>
                <tbody id="tbody">
                    <?php foreach($results as $result):?>
                    <tr>
                        <td class="text-center"><?=$result->id_operadora?></td>
                        <td><?=$result->operadora?></td>
                        <td><?=$result->cnpj?></td>
                        <td class="text-center"><?=$result->dias_repasse?></td>
                        <td><span class="badge <?=$result->status == 1 ? 'badge-success-lighten' : 'badge-danger-lighten'?>"><?=$result->status == 1 ? 'ativo' : 'inativo'?></span></td>
                        <td class="text-center">
                            <a href="<?=base_url('financeiro/opcartoes/editar/'.$result->id_operadora)?>" class="action-icon"><i data-bs-container="#tooltip-container2" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top" class="mdi mdi-square-edit-outline"></i></a>
                            <a href="#" class="action-icon" onclick="excluir(<?=$result->id_operadora?>)"><i class="mdi mdi-delete"></i></a>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </thead>
        </table>
        </div>
    </div>
  </div>
</div>  
<script>
    function excluir(id){
        if(confirm('Tem certeza que deseja excluir este item?')){
            window.location='opcartoes/excluir/'+id;
        }
    }
</script>
<?= $this->endSection() ?>

