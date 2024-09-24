<?= $this->extend('master') ?>

<?= $this->section('content') ?>
   <!-- main content start -->
<div class="main-content">

<div class="container-fluid content-top-gap">
  <div class="container-fluid">
    <div class="mt-2"><?=$this->include('partials/message')?></div>
    <div class="card mt-2">
        <div class="card-header">
            <h4><i class="mdi mdi-cash-multiple"></i> Tipo Conta</h4>
        </div>
        <div class="card-body">
            <form method="post" action="<?=base_url('financeiro/tipo_conta/adicionar')?>">
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="Nome">Descrição</label>  
                        <input id="descricao_tipo" name="descricao_tipo" class="form-control input-md"  type="text">
                    </div>
                </div>
            </div>    
            <div class="row ml-0 mt-3">
                <div class="form-group">
                <label class="control-label" for="Cadastrar"></label>
                <button id="Cadastrar" name="Cadastrar" class="btn btn-primary" type="submit">Cadastrar</button>
                </div>
            </div>
            </div>  
            </form> 
        </div>  
    <div class="card">
        <div class="card-header">
            <h4>Lista</h4>
        </div>
        <div class="card-body">
            <table class="table" id="datatable">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Descrição</th>
                        <th>Situação</th>
                        <th class="text-center">Ação</th>
                    </tr>
                    <tbody id="tbody">
                        <?php foreach($results as $result):?>
                            <tr>
                                <td class="text-center"><?=$result->id_tipo_conta?></td>
                                <td><?=$result->descricao_tipo?></td>
                                <td><span class="badge <?=$result->status == 1 ? 'bg-success' : 'bg-danger'?> rounded-pill"><?=$result->status == 1 ? 'ativo' : 'inativo'?></span></td>
                                <td class="text-center">
                                    <a href="#" class="action-icon" onclick="excluir(<?=$result->id_tipo_conta?>)" title="Excluir"><i class="mdi mdi-delete"></i></a>
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
            window.location='tipo_conta/excluir/'+id;
        }
    }
</script>
<?= $this->endSection() ?>

