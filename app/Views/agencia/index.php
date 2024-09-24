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
                            <h5><i class="fa fa-plus-circle"></i>  CADASTRO DE AGÊNCIAS</h5>
                            </div>
                            <div class="col-sm-5 text-right">
                                <a class="btn btn-warning btn-sm" href=""><i class="fa fa-filter"></i> FILTRAR</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?=base_url('agencia/adicionar')?>">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="Nome">Agencia</label>  
                                        <input id="agencia" name="agencia" class="form-control input-md"  type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="Nome">Banco</label>  
                                    <select class="form-control" name="fk_banco">
                                        <?php foreach($bancos as $banco):?>
                                            <option value="<?=$banco->id_banco?>"><?=$banco->nome?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>   
                                <div class="row ml-0 mt-3">
                                    <div class="form-group mt-3">
                                        <label class="control-label" for="Cadastrar"></label>
                                        <button id="Cadastrar" name="Cadastrar" class="btn btn-primary" type="submit">Cadastrar</button>
                                    </div>
                                </div>  
                            </div>
                        </form> 
                    </div> 
                </div> 
                <div class="card">
                    <div class="card-header">
                    <h5><i class="fa fa-list"></i> LISTA DE AGÊNCIAS</h5>
                    </div>
                    <div class="card-body">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Agencia</th>
                                    <th>Banco</th>
                                    <th>Situação</th>
                                    <th class="text-center">Ação</th>
                                </tr>
                                <tbody id="tbody">
                                    <?php foreach($results as $result):?>
                                        <tr>
                                            <td class="text-center"><?=$result->id_agencia?></td>
                                            <td><?=$result->agencia?></td>
                                            <td><?=$result->nome?></td>
                                            <td><span class="badge <?=$result->status == 1 ? 'bg-success' : 'bg-danger'?> rounded-pill"><?=$result->status == 1 ? 'ativo' : 'inativo'?></span></td>
                                            <td class="text-center">
                                                <a href="#" onclick="excluir(<?=$result->id_agencia?>,'agencia')" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa-solid fa-trash"></i></a>
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
<?= $this->endSection() ?>

