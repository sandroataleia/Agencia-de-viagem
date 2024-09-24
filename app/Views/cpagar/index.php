<?= $this->extend('master') ?>

<?= $this->section('content') ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <!-- Main content -->
            <div class="content">
                <?=$this->include('template/message')?>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-7">
                                <h5><i class="fa fa-plus-circle"></i>  CADASTRO DE CONTAS A PAGAR</h5>
                            </div>
                        
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?=base_url('financas/cpagar/adicionar')?>">
                        <div class="row">
                            <div class="col-sm-2">
                            <div class="form-group">
                                <label for="Nome">Fornecedor</label>  
                                <select name="fk_fornecedor" class="form-control">
                                    <?php foreach($fornecedores as $fornecedor):?>
                                        <option value="<?=$fornecedor->id_fornecedor?>"><?=$fornecedor->fantasia?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                            </div>
                            <div class="col-sm-4">
                            <div class="form-group">
                                <label for="Nome">Descrição</label>  
                                <input id="cpf_usuario" name="cpf_usuario" class="form-control input-md" value="<?=session('cpf')?>"  type="hidden">
                                <input id="nome" name="nome" class="form-control input-md"  type="text">
                            </div>
                            </div>
                            <div class="col-sm-2">
                            <div class="form-group">
                                <label for="Nome">Data de vencimento</label>  
                                <input id="dt_vencimento" required name="dt_vencimento" class="form-control input-md"  type="date">
                            </div>
                            </div>
                            <div class="col-sm-2">
                            <div class="form-group">
                                <label for="Nome">Valor</label>  
                                <input id="valor" name="valor" class="form-control input-md"  type="text">
                            </div>
                            </div>
                            <div class="col-sm-2">
                            <div class="form-group">
                                <label for="Nome">Status</label>  
                                <select name="situacao" class="form-control">
                                    <option value="ab">Aberta</option>
                                    <option value="vc">Vencida</option>
                                    <option value="pg">Paga</option>
                                </select>
                            </div>
                            </div>
                        </div>

                        <div class="row ml-0 mt-3">
                            <div class="col-sm-12">
                            <label>Observações</label>
                            <textarea class="form-control" name="obs" rows="3"></textarea>
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
                    <h5><i class="fa fa-list"></i> LISTA DE CONTAS A PAGAR</h5>
                    </div>
                    <div class="card-body">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Fornecedor</th>
                                    <th>Descrição</th>
                                    <th>Valor</th>
                                    <th>Vencimento</th>
                                    <th>Observação</th>
                                    <th>Situação</th>
                                    <th class="text-center">Ação</th>
                                </tr>
                                <tbody id="tbody">
                                    <?php 
                                        $situacao   = null;
                                        $badge      = null;
                                        foreach($results as $result):
                                        if($result->dt_vencimento<date('Y-m-d') and $result->situacao == 'ab'){
                                            $situacao    = "Vencido";
                                            $badge = "bg-danger";
                                        }else{
                                            if($result->situacao == 'lq'){$badge = "bg-success"; $situacao   = "Liquidado";}
                                            if($result->situacao == 'ab'){$badge = "bg-warning"; $situacao   = "Aberto";}
                                            if($result->situacao == 'vc'){$badge = "bg-danger"; $situacao    = "Vencido";}
                                        }
                                       
                                    ?>

                                    <tr>
                                        <td class="text-center"><?=$result->id_cpagar?></td>
                                        <td><?=$result->fantasia?></td>
                                        <td><?=$result->nome?></td>
                                        <td>R$ <?=$result->valor?></td>
                                        <td><?=$result->dt_vencimento?></td>
                                        <td><?=$result->obs?></td>
                                        <td><span class="badge <?=$badge?>"><?=$situacao?></span></td>
                                        <td class="text-center">
                                            <a href="<?=base_url('financas/cpagar/baixa/'.$result->id_cpagar)?>" title="Baixar" class="btn btn-outline-primary btn-sm <?=$result->situacao == 'lq' ? 'd-none' : ''?>"><i class="fa-solid fa-arrow-down"></i></a>
                                            <a href="#" onclick="excluir(<?=$result->id_cpagar?>,'financas/cpagar')" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa-solid fa-trash"></i></a>
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
            window.location='cpagar/excluir/'+id;
        }
    }
</script>
<?= $this->endSection() ?>

