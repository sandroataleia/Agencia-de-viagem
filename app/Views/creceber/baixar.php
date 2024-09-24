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
                <h5><i class="fa-solid fa-arrow-down"></i> BAIXAR CONTA</h5>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form id="form_cad" method="post" action="<?= base_url('financas/creceber/baixar') ?>">
              <div class="row">
                <div class="col-sm-4">
                  <label>Cliente</label>
                  <input type="text" name="nome" value="<?= $result->nome ?>" class="form-control" readonly>
                </div>
                <div class="col-sm-4">
                  <label for="">Data emissão</label>
                  <input type="hidden" value="<?= $result->id_creceber ?>" name="id_creceber">
                  <input type="text" value="<?= date('d/m/Y',strtotime($result-> data_lancamento))?>" class="form-control" readonly>
                </div>
                <div class="col-sm-4">
                  <label for="">Vencimento</label>
                  <input type="text" value="<?= date('d/m/Y',strtotime($result->data_vencimento)) ?>" class="form-control" readonly>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-sm-4">
                  <label for="">Banco</label>
                  <select required name="fk_banco" class="form-control" onchange="buscaConta(this)">
                    <option class="font-italic">
                      <p class="font-weight-bold font-italic">Selecione o banco</p>
                    </option>
                    <?php foreach ($bancos as $banco): ?>
                      <option value="<?= $banco->id_banco ?>"><?= $banco->nome ?></option>
                    <?php endforeach ?>
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
                    <?php foreach ($fpagamentos as $fpagamento): ?>
                      <option <?= $fpagamento->id_fpagamento == $result->fk_fpagamento ? 'selected' : ''?> value="<?= $fpagamento->id_fpagamento ?>"><?= $fpagamento->descricao_fpagamento ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-sm-4">
                  <label for="">Valor original</label>
                  <input type="text" name="valor" value="R$ <?= str_replace('.',',',$result->valor_original) ?>" class="form-control" readonly>
                </div>
                <div class="col-sm-4">
                  <label for="">Valor aberto</label>
                  <input type="text" name="valor" value="R$ <?= str_replace('.',',',$result->valor_aberto) ?>" class="form-control" readonly>
                </div>
                <div class="col-sm-4">
                  <label for="">Valor a pagar</label>
                  <input type="text" name="valor_pago" value="<?= str_replace('.',',',$result->valor_aberto) ?>" class="form-control">
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-sm-12 text-right">
                  <button type="submit" class="btn btn-primary"><strong>Confirmar</strong></button>
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
  const buscaConta = (elem) => {
    let id = elem.options[elem.selectedIndex];

    $.ajax({
      url: '<?= base_url('financas/cpagar/buscaConta/') ?>' + id.value,
      method: 'get',
      success: function(data) {
        var response = JSON.parse(data);
        html = "";
        for (i = 0; i < response.length; i++) {
          html += `
              <option value='${response[i].id_conta}'>${response[i].numero_conta}</option>
            `;
        }
        $('#conta').html(html);
      }
    });
  }
</script>
<?= $this->endSection() ?>