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
                                            <h5><i class="fa fa-list"></i>  LISTA DE PRODUTOS</h5>
                                        </div>
                                        <div class="col-sm-5 text-right">
                                            <a class="btn btn-primary btn-sm mr-3" href="<?=base_url('produto/formulariodecadastro')?>"><i class="fa fa-plus"></i> ADICIONAR</a>
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
                                                <th>Imagem</th>
                                                <th>Produto</th>
                                                <th>Preço</th>
                                                <th>Estoque</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($results as $result):?>
                                                <tr>
                                                    <td><?=$result->id_produto?></td>
                                                    <td><img src="<?=base_url('assets/img_produto/'.$result->imagem)?>" class="img-fluid img-produto"></td>
                                                    <td><?=$result->produto?></td>
                                                    <td><?=$result->preco?></td>
                                                    <td><?=$result->estoque_atual?></td>
                                                    <td>
                                                        <a href="<?=base_url('produto/formulariodeedicao/'.$result->id_produto)?>" class="btn btn-outline-warning btn-sm mr-2"><i class="fa-solid fa-pen-to-square"></i> EDITAR</a>
                                                        <a href="#" onclick="excluir(<?=$result->id_produto?>,'produto')" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i> EXCLUIR</a>
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

