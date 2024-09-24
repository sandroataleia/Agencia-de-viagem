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
                                            <h5><i class="fa fa-list"></i>  LISTA DE UNIDADES</h5>
                                        </div>
                                        <div class="col-sm-5 text-right">
                                            <a class="btn btn-primary btn-sm mr-3" href="<?=base_url('unidade/formulariodecadastro')?>"><i class="fa fa-plus"></i> ADICIONAR</a>
                                            <a class="btn btn-warning btn-sm" href=""><i class="fa fa-filter"></i> FILTRAR</a>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <?=$this->include('template/message')?>
                                    <table class="table table-striped" id="datatable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Unidade</th>
                                                <th>Descrição</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($results as $result):?>
                                                <tr>
                                                    <td><?=$result->id_unidade?></td>
                                                    <td><?=$result->unidade?></td>
                                                    <td><?=$result->descricao_unidade?></td>
                                                    <td>
                                                        <a href="<?=base_url('unidade/formulariodeedicao/'.$result->id_unidade)?>" class="btn btn-outline-warning btn-sm mr-2"><i class="fa-solid fa-pen-to-square"></i> EDITAR</a>
                                                        <a href="#" onclick="excluir(<?=$result->id_unidade?>,'unidade')" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i> EXCLUIR</a>
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
    </div>
</div>

<?= $this->endSection() ?>

