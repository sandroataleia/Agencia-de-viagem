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
                                <h5><i class="fa fa-plus-circle"></i> ADICIONAR ENTRADA OU SAÍDA</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?=base_url('financas/entrada_saida/adicionar')?>">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"  onchange="entrada()" name="entrada_saida" id="inlineRadio1" value="entrada" checked>
                                            <label class="form-check-label" for="inlineRadio1">Entrada</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" onchange="saida()" name="entrada_saida" id="inlineRadio2" value="saida">
                                            <label class="form-check-label" for="inlineRadio2">Saida</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group d-none" id="fornecedor">
                                        <label for="Nome">Fornecedor</label>  
                                        <select name="cliente_fornecedor" class="form-control fornecedor" id="select2" disabled>
                                            <?php foreach($fornecedores as $fornecedor):?>
                                                <option value="<?=$fornecedor->fantasia?>"><?=$fornecedor->fantasia?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                    <div class="form-group" id="cliente">
                                        <label>Cliente</label>  
                                        <select name="cliente_fornecedor" class="form-control cliente select2" >
                                            <?php foreach($clientes as $cliente):?>
                                                <option value="<?=$cliente->nome?>"><?=$cliente->nome?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="Nome">Descrição</label>  
                                        <input id="nome" name="descricao" class="form-control input-md"  type="text">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="Nome">Valor</label>  
                                        <input id="valor" name="valor" class="form-control input-md"  type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-sm-4">
                                    <label for="">Banco</label>
                                    <select required name="banco" class="form-control" onchange="buscaConta(this)">
                                        <option class="font-italic"><p class="font-weight-bold font-italic">Selecione o banco</p></option>
                                        <?php foreach($bancos as $banco):?>
                                            <option value="<?=$banco->id_banco?>"><?=$banco->nome?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Conta</label>
                                    <select required id="conta" class="form-control" name="numero_conta">

                                    </select>
                                </div>
                                <div class="col-sm-4">
                                <label for="">Tipo</label>
                                    <select id="conta" class="form-control" name="fpagamento">
                                        <option value="transferencia">Transferência</option>
                                        <option value="pix">Pix</option>
                                    </select>
                                </div>
                            </div>
            
                            <div class="row ml-0 mt-3">
                                <div class="form-group">
                                    <button id="Cadastrar" name="Cadastrar" class="btn btn-primary" type="submit">Adicionar</button>
                                </div>
                            </div>
                        </div>  
                    </form> 
                </div>  
                <div class="card">
                    <div class="card-header">
                    <h5><i class="fa fa-list"></i> LISTA DE ENTRADAS E SAÍDAS</h5>
                    </div>
                    <div class="card-body">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Tipo Movimentação</th>
                                    <th>Cliente/Fornecedor</th>
                                    <th>Forma de pagamento</th>
                                    <th>Banco</th>
                                    <th>Conta</th>
                                    <th>Data</th>
                                    <th>Valor</th>
                                    <th class="text-center">Ação</th>
                                </tr>
                                <tbody id="tbody">
                                    <?php foreach($results as $result):?>
                                        <tr>
                                            <td class="text-center"><?=$result->id_movimentacao?></td>
                                            <td><?=$result->entrada_saida?></td>
                                            <td><?=$result->cliente_fornecedor?></td>
                                            <td><?=$result->fpagamento?></td>
                                            <td><?=$result->banco?></td>  
                                            <td><?=$result->numero_conta?></td> 
                                            <td><?=$result->data?></td>
                                            <td>R$  <?=str_replace('.',',',$result->valor)?></td>
                                            <td class="text-center">
                                                <a href="#" onclick="excluir(<?=$result->id_movimentacao?>,'financas/entrada_saida')" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa-solid fa-trash"></i></a>
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
    function saida(){
        $("#cliente").addClass('d-none');
        $("#fornecedor").removeClass('d-none');
        $(".cliente").attr('disabled');
        $(".fornecedor").removeAttr('disabled');
    }
    function entrada(){
        $("#fornecedor").addClass('d-none');
        $("#cliente").removeClass('d-none');
        $(".fornecedor").attr('disabled');
        $(".cliente").removeAttr('disabled');
    }

    function buscaConta(elem){
      let id = elem.options[elem.selectedIndex];
      
      $.ajax({
        url: '<?=base_url('financas/cpagar/buscaConta/')?>'+id.value,
        method: 'get',
        success:function(data){
          var response = JSON.parse(data);
          html = "";
          for(i=0;i<response.length;i++){
            html+= `
              <option value='${response[i].numero_conta}'>${response[i].numero_conta}</option>
            `;
          }
          $('#conta').html(html);
        }
      });
    }
</script>
<?= $this->endSection() ?>

