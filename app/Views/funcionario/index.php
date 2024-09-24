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
                                <h5><i class="fa fa-list"></i>  LISTA DE FUNCIONÁRIOS</h5>
                            </div>
                            <div class="col-sm-5 text-right">
                                <a class="btn btn-primary btn-sm mr-3" href="<?=base_url('funcionario/formulario_cadastro')?>"><i class="fa fa-plus"></i> ADICIONAR</a>
                                <a class="btn btn-warning btn-sm" href=""><i class="fa fa-filter"></i> FILTRAR</a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-body"> 
                        <table class="table table-striped" id="datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>CPF</th>
                                    <th>Nome</th>
                                    <th>Setor</th>
                                    <th>Contato</th>
                                    <th>Status</th>
                                    <th class="text-center">Ação</th>
                                </tr>
                                <tbody id="tbody">
                                    <?php foreach($results as $result):?>
                                    <tr>
                                        <td class="text-center"><?=$result->id_funcionario?></td>
                                        <td><?=$result->cpf?></td>
                                        <td><?=$result->nome?></td>
                                        <td><?=$result->cargo?></td>
                                        <td><?=$result->telefone?></td>
                                        <td><span class="badge <?=$result->status == 1 ? 'bg-success' : 'bg-danger'?> rounded-pill"><?=$result->status == 1 ? 'ativo' : 'inativo'?> </span></td>
                                        <td class="text-center">
                                            <a href="<?=base_url('funcionario/editar/'.$result->cpf)?>" class="btn btn-outline-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="#" onclick="excluir(<?=$result->id_funcionario?>,'funcionario')" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa-solid fa-trash"></i></a>
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
    </div>
</div>  
<script>
    function excluir(id){
        if(confirm('Tem certeza que deseja excluir este Funcionário?')){
            window.location='funcionario/excluir/'+id;
        }
    }
</script>
<?= $this->endSection() ?>

