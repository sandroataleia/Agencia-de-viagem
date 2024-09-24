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
                        <form method="post" action="<?=base_url('financas/entrada/adicionar')?>">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group d-none" id="fornecedor">
                                    <label for="Nome">Fornecedor</label>  
                                    <select name="cpf_cnpj" class="form-control fornecedor" disabled>
                                        <?php foreach($fornecedores as $fornecedor):?>
                                            <option value="<?=$fornecedor->id_fornecedor?>"><?=$fornecedor->fantasia?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="form-group" id="cliente">
                                    <label for="Nome">Cliente</label>  
                                    <select name="cpf_cnpj" class="form-control cliente" id="select2">
                                        <?php foreach($clientes as $cliente):?>
                                            <option value="<?=$cliente->cpf?>"><?=$cliente->nome?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="Nome">Descrição</label>  
                                    <input id="cpf_usuario" name="cpf_usuario" class="form-control input-md" value="<?=session('cpf')?>"  type="hidden">
                                    <input id="nome" name="nome" class="form-control input-md"  type="text">
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
                                <select required name="fk_banco" class="form-control" onchange="buscaConta(this)">
                                    <option class="font-italic"><p class="font-weight-bold font-italic">Selecione o banco</p></option>
                                    <?php foreach($bancos as $banco):?>
                                    <option value="<?=$banco->id_banco?>"><?=$banco->nome?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="">Conta</label>
                                <select required id="conta" class="form-control" name="fk_conta">

                                </select>
                            </div>
                            <div class="col-sm-4">
                              <label for="">Forma de pagamento</label>
                                  <select id="conta" class="form-control" name="fk_fpagamento">
                                    <?php foreach($fpagamentos as $fpagamento):?>
                                      <option value="<?=$fpagamento->id_fpagamento?>"><?=$fpagamento->forma?></option>
                                    <?php endforeach?>
                                  </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <label>Observações</label>
                                <textarea class="form-control" name="obs" rows="3"></textarea>
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
                    <h5><i class="fa fa-list"></i> LISTA DE ENTRADAS</h5>
                    </div>
                    <div class="card-body">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Cliente</th>
                                    <th>Descrição</th>
                                    <th>Valor</th>
                                    <th>Vencimento</th>
                                    <th>Observação</th>
                                    <th>Situação</th>
                                    <th class="text-center">Ação</th>
                                </tr>
                                <tbody id="tbody">
                                    <?php foreach($results as $result):?>
                                        <tr>
                                            <td class="text-center"><?=$result->id_movimentacao?></td>
                                            <td><?=$result->valor?></td>
                                            <td><?=$result->fk_fornecedor_cliente?></td>
                                            <td>R$ <?=$result->data?></td>
                                            <td><?=$result->fk_banco?></td>
                                            <td><?=$result->fk_conta?></td>
                                            <td class="text-center">
                                                <a href="#" onclick="excluir(<?=$result->id_movimentacao?>,'financeiro/entradas_saidas')" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa-solid fa-trash"></i></a>
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
              <option value='${response[i].id_conta}'>${response[i].numero_conta}</option>
            `;
          }
          $('#conta').html(html);
        }
      });
    }
</script>
<?= $this->endSection() ?>

