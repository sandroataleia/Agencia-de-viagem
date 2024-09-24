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
                                <h5><i class="fa-solid fa-magnifying-glass"></i> BUSCAR CONTA PARA CONCILIAR</h5>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body ">
                        <form method="post" action="<?=base_url('contabil/conciliacao/buscar')?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Nome">Banco</label>  
                                        <select required name="banco" class="form-control" onchange="buscaConta(this)">
                                        <option class="font-italic"><p class="font-weight-bold font-italic">Selecione o banco</p></option>
                                            <?php foreach($bancos as $banco):?>
                                                <option value="<?=$banco->id_banco?>"><?=$banco->nome?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Nome">Conta</label>  
                                        <select required id="conta" class="form-control" name="conta">

                                        </select>
                                    </div>
                                </div>
                            
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Nome">Data</label>  
                                        <input id="dt_vencimento" name="data" class="form-control input-md"  type="date">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Nome">Carregar Arquivo ()</label>  
                                        <button data-toggle="modal" data-target="#modalArquivo" class="btn btn-default" style="float: right;"><i class="fa-solid fa-arrow-up-from-bracket"></i> Carregar arquivo</button>
                                    </div>
                                </div>

                                
                                <div class="col-sm-1">
                                    <div class="form-group mt-2">
                                        <label></label>
                                        <button id="Cadastrar" name="Cadastrar" class="btn btn-primary btn-block" type="submit"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                                    </div>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>  
                <div class="card">
                    <div class="card-header">
                      <div class="row">
                        <div class="col-md-10">
                          <h5><i class="fa fa-list"></i> FAZER CONCILIAÇÃO</h5>
                        </div>
                        <div class="col-md-2">
                          
                        </div>
                      </div>
                      
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
                                                <?php if($result->conciliado == 1):?>
                                                    <a href="javascript:void(0)" class="btn btn-success btn-sm">Conciliado</a>
                                                <?php else:?>
                                                    <a href="<?=base_url('contabil/conciliacao/conciliar/'.$result->id_movimentacao)?>" class="btn btn-warning btn-sm">Conciliar</a>
                                                <?php endif?>
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

