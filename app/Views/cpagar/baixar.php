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
                                <h5><i class="fa-solid fa-arrow-down"></i>  BAIXAR CONTA</h5>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form_cad" method="post" action="<?=base_url('financas/cpagar/baixar')?>">
                          <div class="row">
                            <div class="col-sm-4">
                              <label>Fornecedor </label>
                              <input type="text" name="fantasia" value="<?=$result->fantasia?>" class="form-control" readonly>
                            </div>
                            <div class="col-sm-4">
                              <label for="">Descrição</label>
                              <input type="hidden" value="<?=$result->id_cpagar?>" name="id_cpagar">
                              <input type="text" value="<?=$result->nome?>" class="form-control" readonly>
                            </div>
                            <div class="col-sm-2">
                              <label for="">Valor</label>
                              <input type="text" name="valor" value="<?=$result->valor?>" class="form-control" readonly>
                            </div>
                            <div class="col-sm-2">
                              <label for="">Vencimento</label>
                              <input type="text" value="<?=$result->dt_vencimento?>" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="row mt-3">
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

                          <div class="row mt-4">
                            <div class="col-sm-2">
                              <button type="submit" class="btn btn-primary btn-block"><strong>Confirmar</strong></button>
                            </div>
                          </div>
                        </form> 
                    </div>
                </div>
            </div>  
        </div>
    </div>
  </div>
  <script>
    const buscaConta = (elem) =>{
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
