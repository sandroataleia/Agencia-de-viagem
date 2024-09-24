<?= $this->extend('master') ?>

<?= $this->section('content') ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <h5><i class="fa fa-list"></i>  LISTA DE PERFIS DE USUÁRIO</h5>
                                        </div>
                                        <div class="col-sm-5 text-right">
                                            <a class="btn btn-primary btn-sm mr-3" href="<?=base_url('perfil/formulario_cadastro')?>"><i class="fa fa-plus"></i> ADICIONAR</a>
                                            <a class="btn btn-warning btn-sm" href=""><i class="fa fa-filter"></i> FILTRAR</a>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <?=$this->include('template/message')?> 
                                    <table class="table table-striped" id="datatable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th>Perfil</th>
                                                <th>Descrição</th>
                                                <th class="text-center">Ação</th>
                                            </tr>
                                            <tbody id="tbody">
                                                <?php foreach($results as $result):?>
                                                <tr>
                                                    <td class="text-center"><?=$result->id_perfil?></td>
                                                    <td><?=$result->perfil?></td>
                                                    <td><?=$result->descricao?></td>
                                                    <td class="text-center">
                                                        <a href="<?=base_url('perfil/formulario_edicao/'.$result->id_perfil)?>" class="btn btn-outline-warning btn-sm" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="#" onclick="excluir(<?=$result->id_perfil?>,'perfil')" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa-solid fa-trash"></i></a>
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
        </div>
    </div>
</div>  
<script>
    function excluir(id,url){
        if(confirm('Tem certeza que deseja excluir este item?')){
            window.location='cargo/'+url+'/'+id;
        }
    }
</script>
<?= $this->endSection() ?>

