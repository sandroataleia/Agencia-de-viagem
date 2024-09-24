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
                                            <h5><i class="fa fa-plus-circle"></i> LANÇAR VENDA DE SEGURO VIAGEM</h5>
                                        </div>
                                        <div class="col-sm-5 text-right">    
                                            <a class="btn btn-warning btn-sm" href="<?=base_url('vendas')?>"><i class="fa-solid fa-arrow-left"></i> VOLTAR</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                  <form action="<?=base_url('vendas/seguro_viagem/adicionar')?>"  method="post" enctype="multipart/form-data">
                                    <div class="row">
                                      <div class="col-sm-4 mb-1">
                                        <div class="form-group">
                                          <label for="Nome">CPF cliente</label>  
                                            <input id="cpfCli" placeholder="apenas números" name="cpf" onblur="buscaCli($(this).val())" required class="form-control input-md"  type="number">
                                        </div>
                                      </div>
                                      <div class="col-sm-8 mb-1">
                                        <div class="form-group">
                                          <label for="Nome">Cliente</label>  
                                            <input id="nomcli" class="form-control input-md"  type="text" readonly>
                                        </div>
                                      </div>
                                     
                                    </div>
                                    <div class="row"> 
                                      <div class="col-sm-3 mb-1">
                                        <div class="form-group">
                                          <label for="Nome">Data do início da vigência</label>  
                                          <input name="inicio_vigencia" class="form-control input-md"  type="date" required>
                                        </div>
                                      </div>
                                      <div class="col-sm-3 mb-1">
                                        <div class="form-group">
                                          <label for="Nome">data do fim da vigência</label>  
                                          <input name="fim_vigencia" class="form-control input-md"  type="date" required>
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <label for="Nome">Seguradora</label>  
                                            <input name="seguradora" placeholder="nome" class="form-control input-md"  type="text" required>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row"> 
                                      <div class="col-sm-3 mb-1">
                                        <label for="Nome">Teve indicação?</label>  
                                        <select class="custom-select" id="verificaParceiro" onchange="indicacao(this)">
                                          <option value="1">Sim</option>
                                          <option value="0" selected>Não</option>
                                        </select>
                                      </div>
                                      <div class="col-sm-3">
                                        <label for="Nome">Parceiro</label>  
                                        <select class="select2" id="parceiro" disabled name="fk_parceiro" style="width: 100%;;">
                                          <?php foreach($parceiros as $parceiro):?>
                                            <option value="<?=$parceiro->id_parceiros?>"><?=$parceiro->nome?></option>
                                          <?php endforeach?>
                                        </select>
                                      </div>
                                      <div class="col-sm-3 mb-1">
                                        <label>Forma de pagamento</label>
                                        <select class="custom-select" name="fk_fpagamento">
                                          <?php foreach($fpagamentos as $fpagamento):?>
                                            <option value="<?=$fpagamento->id_fpagamento?>"><?=$fpagamento->descricao_fpagamento?></option>
                                          <?php endforeach?>
                                        </select>
                                      </div>
                                      <div class="col-sm-3 mb-1">
                                        <div class="form-group">
                                          <label for="Nome">Valor</label>  
                                          <input name="valor_liquido" placeholder="R$ 1815,88" class="form-control input-md"  type="text" required>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row ml-0 mt-4">
                                      <div class="col-sm-12 text-right">
                                        <button id="Cadastrar" name="Cadastrar" class="btn btn-primary" type="submit">Salvar</button>
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
<script> 
 const buscaCli = (cpf) => {  
  $.ajax({
    url: '<?=base_url('cliente/buscaCli/')?>'+cpf,
    method: 'get',
    success:function(data){
      var response = JSON.parse(data);
      if(response !=null){
        $("#nomcli").val(response.nome);
      }else{
        alert("CPF não cadastrado!");
        $('#cpfCli').focus();
        $('#cpfCli').val('');
      }    
    }
  });
}


const indicacao = (elem) =>{
  if($('#verificaParceiro').val() == 1){
    $('#parceiro').prop('disabled',false);
    console.log('enabled');
  }else{
    $('#parceiro').prop('disabled','disabled');
    console.log('disabled');
  }
}
</script>
<?= $this->endSection() ?>
