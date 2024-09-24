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
                                            <h5><i class="fa-solid fa-circle-plus"></i> EDITAR PRODUTO</h5>
                                        </div>
                                        <div class="col-sm-5 text-right">
                                            <a class="btn btn-primary btn-sm mr-3" href="<?=base_url('produto')?>"><i class="fa-solid fa-arrow-left"></i> VOLTAR</a>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <?=$this->include('template/message')?>
                                    <form method="post" action="<?=base_url('produto/alterar')?>" enctype="multipart/form-data">
                                        <div class="row justify-content-center pt-3 pb-3">
                                            <div class="col-sm-12">
                                                <div class="row ">
                                                    <div class="col-sm-3 d-flex border align-items-center">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <img id="preview_image" alt="" src="<?=base_url('assets/img_produto/'.$result->imagem)?>" class="w-100 h-100">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <input type="file" onchange="preview(this);" value="<?=$result->imagem?>" class="form-control btn-block" name="imagem" id="files">
                                                            </div>
                                                        </div>      
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <div class="row">
                                                            <div class="col-sm-8">
                                                                <label for="descricao">Descrição do produto</label>
                                                                <input type="hidden" name="id_produto" value="<?=$result->id_produto?>" class="form-control">
                                                                <input type="text" name="produto" value="<?=$result->produto?>" class="form-control" required>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label for="descricao">Código de barra</label>
                                                                <input type="text" name="codigo_barra" value="<?=$result->codigo_barra?>" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-sm-4">
                                                                <label for="categoria">Categoria</label>
                                                                <select name="id_categoria" class="form-control">
                                                                    <?php foreach($categorias as $categoria):?>
                                                                        <option <?=$result->id_categoria == $categoria->id_categoria ? 'selected' : ''?> value="<?=$categoria->id_categoria?>"><?=$categoria->categoria?></option>
                                                                    <?php endforeach?>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label for="unidade">Unidade</label>
                                                                <select name="id_unidade" class="form-control">
                                                                    <?php foreach($unidades as $unidade):?>
                                                                        <option <?=$result->id_unidade == $unidade->id_unidade ? 'selected' : ''?> value="<?=$unidade->id_unidade?>"><?=$unidade->unidade?> - <?=$unidade->descricao_unidade?></option>
                                                                    <?php endforeach?>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label for="descricao">Preço</label>
                                                                <input type="text" name="preco" value="<?=$result->preco?>" class="form-control" id="money" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-sm-3">
                                                                <label for="produto">Produto</label>
                                                                <select name="eh_produto" class="form-control">
                                                                    <option value="s">Sim</option>
                                                                    <option <?=$result->eh_produto == 'n' ? 'selected' : ''?> value="n">Não</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label for="insumo">Insumo</label>
                                                                <select name="eh_insumo" class="form-control">
                                                                    <option value="s">Sim</option>
                                                                    <option <?=$result->eh_insumo == 'n' ? 'selected' : ''?> value="n">Não</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label for="promocao">Promoção</label>
                                                                <select name="eh_promocao" class="form-control">
                                                                    <option value="s">Sim</option>
                                                                    <option <?=$result->eh_promocao == 'n' ? 'selected' : ''?> value="n">Não</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label for="maisvendido">Mais vendido</label>
                                                                <select name="mais_vendido" class="form-control">
                                                                    <option value="s">Sim</option>
                                                                    <option <?=$result->eh_maisvendido== 'n' ? 'selected' : ''?> value="n">Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-sm-3">
                                                                <label for="lancamento">Lançamento</label>
                                                                <select name="eh_lancamento" class="form-control">
                                                                    <option value="s">Sim</option>
                                                                    <option <?=$result->eh_lancamento == 'n' ? 'selected' : ''?> value="n">Não</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label for="custoatual">Custo atual</label>
                                                                <input type="text" id="money1" value="<?=$result->custo_atual?>" name="custo_atual" class="form-control">
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label for="customedio">Custo médio</label>
                                                                <input type="text" id="money2" value="<?=$result->custo_medio?>" name="custo_medio" class="form-control">
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label for="custoproducao">Custo produção</label>
                                                                <input type="text" id="money3" value="<?=$result->custo_producao?>" name="custo_producao" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-sm-4">
                                                                <label for="custoatual">Estoque inicial</label>
                                                                <input type="text" id="money4" value="<?=$result->estoque_inicial?>" name="estoque_inicial" class="form-control">
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label for="customedio">Estoque mínimo</label>
                                                                <input type="text" id="money5" value="<?=$result->estoque_minimo?>" name="estoque_minimo" class="form-control">
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label for="custoproducao">Estoque máximo</label>
                                                                <input type="text" id="money6" value="<?=$result->estoque_maximo?>" name="estoque_maximo" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-sm-4">
                                                                <label for="custoatual">Estoque atual</label>
                                                                <input type="text" id="money7" value="<?=$result->estoque_atual?>" name="estoque_atual" class="form-control">
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label for="customedio">Estoque reservado</label>
                                                                <input type="text" id="money8" value="<?=$result->estoque_reservado?>" name="estoque_reservado" class="form-control">
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label for="custoproducao">Estoque real</label>
                                                                <input type="text" id="money9" value="<?=$result->estoque_real?>" name="estoque_real" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row  justify-content-center">
                                                    <div class="col-sm-4">
                                                        <button class="btn btn-primary mt-4 btn-block" type="submit">Alterar</button>
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
        </div>
    </div>
</div>

<?= $this->endSection() ?>

