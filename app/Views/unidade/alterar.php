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
                                            <h5><i class="fa-solid fa-pen-to-square"></i> EDITAR UNIDADE</h5>
                                        </div>
                                        <div class="col-sm-5 text-right">
                                            <a class="btn btn-primary btn-sm mr-3" href="<?=base_url('unidade')?>"><i class="fa-solid fa-arrow-left"></i> VOLTAR</a>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <?=$this->include('template/message')?>
                                    <form method="post" action="<?=base_url('unidade/alterar')?>">
                                        <div class="row  justify-content-center pt-3 pb-3">
                                            <div class="col-sm-5">
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <label for="unidade">Unidade</label>
                                                        <input class="form-control" type="hidden" name="id_unidade" value="<?=$result->id_unidade?>">
                                                        <input value="<?=$result->unidade?>" type="text" class="form-control" name="unidade" placeholder="Ex: un">
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <label for="unidade">Descrição</label>
                                                        <input value="<?=$result->descricao_unidade?>" type="text" class="form-control" name="descricao_unidade" placeholder="Digite o nome da unidade">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary mt-4 btn-block" type="submit">ALTERAR</button>
                                            </div>
                                        </div>
                                    </form>
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

