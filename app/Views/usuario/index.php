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
                                            <h5><i class="fa fa-list"></i>  LISTA DE USUÁRIOS</h5>
                                        </div>
                                        <div class="col-sm-5 text-right">
                                            <a class="btn btn-primary btn-sm mr-3" href="<?=base_url('usuario/formulario_cadastro')?>"><i class="fa fa-plus"></i> ADICIONAR</a>
                                            <a class="btn btn-warning btn-sm" href=""><i class="fa fa-filter"></i> FILTRAR</a>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped" id="datatable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nome</th>
                                                <th>Usuário</th>
                                                <th>CPF</th>
                                                <th class="text-center">Ação</th>
                                            </tr>
                                            <tbody>
                                                <?php foreach($results as $result):?>
                                                    <tr>
                                                        <td><?=$result->id_usuario?></td>
                                                        <td><?=$result->nome_usuario?></td>
                                                        <td><?=$result->user?></td>
                                                        <td><?=$result->cpf?></td>
                                                        <td class="text-center">
                                                            <a href="<?=base_url('usuario/perfil/'.$result->id_usuario)?>" class="btn btn-outline-info btn-sm" title="Editar perfil"><i class="fa-solid fa-user-pen"></i></a>
                                                            <a href="<?=base_url('usuario/formulario_edicao/'.$result->id_usuario)?>" class="btn btn-outline-warning btn-sm" title="Alterar senha"><i class="fa-solid fa-key"></i></a>
                                                            <a href="#" onclick="excluir(<?=$result->id_usuario?>,'usuario')" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa-solid fa-trash"></i></a>
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
<?= $this->endSection() ?>