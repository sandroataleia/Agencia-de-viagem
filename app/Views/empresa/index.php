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
                                <h5><i class="fa fa-list"></i>  DADOS DA EMPRESA</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?=$this->include('template/message')?>
                        <form method="post" action="<?=base_url('empresa/adicionar')?>" enctype="multipart/form-data">
                            <div class="row justify-content-center pt-3 pb-3">
                                <div class="col-sm-12">
                                    <div class="row ">
                                        <div class="col-sm-4">
                                            <label>Logo</label>
                                            <input type="file" class="form-control btn-block" value="<?=isset($result->logo) ? $result->logo : ''?>" name="imagem">                         
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="descricao">Razão social</label>
                                            <input type="text" name="razao_social" value="<?=isset($result->razao_social) ? $result->razao_social : ''?>" class="form-control" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="descricao">Nome Fantasia</label>
                                            <input type="text" name="fantasia" value="<?=isset($result->fantasia) ? $result->fantasia : ''?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-4">
                                            <label for="categoria">CNPJ</label>
                                            <input type="text" name="cnpj" value="<?=isset($result->cnpj) ? $result->cnpj : ''?>" class="form-control" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="unidade">Inscrição Estadual</label>
                                            <input type="text" name="inscricao_estadual" value="<?=isset($result->inscricao_estadual) ? $result->inscricao_estadual : ''?>" class="form-control" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="descricao">Inscrição Municipal</label>
                                            <input type="text" name="inscricao_municipal" value="<?=isset($result->municipal) ? $result->inscricao_municipal : ''?>" class="form-control" id="money">
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn btn-primary btn-block"><strong>Salvar</strong></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

