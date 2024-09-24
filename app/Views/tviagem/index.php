<?= $this->extend('master') ?>

<?= $this->section('content') ?>
   <!-- main content start -->
<div class="main-content">

<div class="container-fluid content-top-gap">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb my-breadcrumb">
      <li class="breadcrumb-item"><a href="<?=base_url('/')?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?=base_url('viagem')?>">Viagens</a>
      <li class="breadcrumb-item active" aria-current="page">Tipo de Viagem</li>
    </ol>
  </nav>
  <div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <a href="<?=base_url('tviagem/formCad')?>" class="btn btn-primary">
            <i class="mdi mdi-plus-circle me-2"></i> Adicionar 
            </a>
        </div>
        <div class="card-body">
        <table class="table table-striped" id="datatable">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th>Tipo</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th class="text-center">Ação</th>
                </tr>
                <tbody id="tbody">
                    <?php foreach($results as $result):?>
                    <tr>
                        <td class="text-center"><?=$result->id_tviagem?></td>
                        <td><?=$result->tipo?></td>
                        <td><?=$result->descricao?></td>
                        <td><span class="badge badge <?=$result->status == 1 ? 'badge-success' : 'badge-warning'?>"><?=$result->status == 1 ? 'ativo' : 'inativo'?></span></td>
                        <td class="text-center">
                            <a href="<?=base_url('tviagem/editar/'.$result->id_tviagem)?>" class="action-icon"><i class="mdi mdi-square-edit-outline"></i></a>
                            <a href="#" class="action-icon" onclick="excluir(<?=$result->id_tviagem?>)"><i  class="mdi mdi-delete"></i></a>
                        </td>
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
            window.location='tviagem/excluir/'+id;
        }
    }
</script>
<?= $this->endSection() ?>

