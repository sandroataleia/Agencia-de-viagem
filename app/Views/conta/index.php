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
                                <h5><i class="fa fa-plus-circle"></i>  CADASTRO DE CONTA</h5>
                            </div>
                
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?=base_url('conta/adicionar')?>">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="Nome">Numero</label>  
                                        <input name="numero" class="form-control input-md"  type="number" required>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label for="Nome">Banco</label>  
                                    <select class="form-control" name="fk_agencia">
                                        <?php foreach($bancos as $banco):?>
                                            <option value="<?=$banco->id_banco?>"><?=$banco->nome?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="Nome">Agencia</label>  
                                    <select class="form-control" name="fk_agencia">
                                        <?php foreach($agencias as $agencia):?>
                                            <option value="<?=$agencia->id_agencia?>"><?=$agencia->agencia?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="Nome">tipo de conta</label>  
                                    <select class="form-control" name="fk_tipoconta">
                                        <?php foreach($tcontas as $tconta):?>
                                            <option value="<?=$tconta->id_tipo_conta?>"><?=$tconta->descricao_tipo?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="Nome">Saldo inicial</label>  
                                        <input name="saldo_inicial" class="form-control input-md"  type="text">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="Nome">Cheque especial</label>  
                                        <input name="cheque_especial" class="form-control input-md"  type="text">
                                    </div>
                                </div>   
                                <div class="row ml-0 mt-3">
                                    <div class="form-group mt-3">
                                        <label class="control-label" for="Cadastrar"></label>
                                        <button id="Cadastrar" name="Cadastrar" class="btn btn-primary" type="submit">Cadastrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </form> 
                </div>  
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fa fa-list"></i> LISTA DE CONTAS</h5>
                    </div>
                    <div class="card-body">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Numero</th>
                                    <th>Banco</th>
                                    <th>Agencia</th>
                                    <th>Tipo conta</th>
                                    <th>Saldo Inicial</th>
                                    <th>Cheque especial</th>
                                    <th>Status</th>
                                    <th class="text-center">Ação</th>
                                </tr>
                                <tbody id="tbody">
                                    <?php foreach($results as $result):?>
                                        <tr>
                                            <td class="text-center"><?=$result->id_conta?></td>
                                            <td><?=$result->numero_conta?></td>
                                            <td><?=$result->nome?></td>
                                            <td><?=$result->agencia?></td>
                                            <td><?=$result->descricao_tipo?></td>
                                            <td><?=$result->saldo_inicial?></td>
                                            <td><?=$result->cheque_especial?></td>
                                            <td class="text-center"><span class="badge <?=$result->status == 1 ? 'bg-success' : 'bg-danger'?> rounded-pill"><?=$result->status == 1 ? 'ativo' : 'inativo'?></span></td>
                                            <td class="text-center">
                                                <a href="#" onclick="excluir(<?=$result->id_conta?>,'conta')" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa-solid fa-trash"></i></a>
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
        if(confirm('Tem certeza que deseja excluir este item?')){
            window.location='conta/excluir/'+id;
        }
    }
</script>
<?= $this->endSection() ?>

