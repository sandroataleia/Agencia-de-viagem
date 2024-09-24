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
                      <h5><i class="fa fa-plus-circle"></i> LANÇAR VENDA DE PASSAGEM AÉREA VOLTA</h5>
                    </div>
                    <div class="col-sm-5 text-right">
                      <a class="btn btn-warning btn-sm" href="<?= base_url('vendas') ?>"><i class="fa-solid fa-arrow-left"></i> VOLTAR</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <form action="<?= base_url('vendas/viagem/adicionar_viagem_volta') ?>" method="post">
                  <div class="row">
                      <div class="col-sm-4 mb-1">
                        <div class="form-group">
                          <label for="Nome">CPF cliente</label>
                          <input id="cpfCli" name="cpf" readonly value="<?=$cpf?>" required class="form-control input-md" type="number">
                        </div>
                      </div>
                      <div class="col-sm-8 mb-1">
                        <div class="form-group">
                          <label for="Nome">Cliente</label>
                          <input id="nomcli" class="form-control input-md" value="<?=$nome?>" type="text" readonly>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row align-items-center">
                      <div class="col-sm-4 mb-1">
                        <div class="form-group">
                          <label for="Nome">Data da volta</label>
                          <input name="data_viagem" class="form-control input-md" type="date" required>
                        </div>
                      </div>
                      <div class="col-sm-4 mb-1">
                        <div class="form-group">
                          <label for="Nome">Hora embarque</label>
                          <input name="hora_embarque" class="form-control input-md" type="time" required>
                        </div>
                      </div>
                      <div class="col-sm-4 mb-1">
                        <div class="form-group">
                          <label for="Nome">Hora da viagem</label>
                          <input name="hora_viagem" class="form-control input-md" type="time" required>
                        </div>
                      </div>
                    </div>
                    <div class="row align-items-center">

                      <div class="col-sm-4 mb-1">
                        <div class="form-group">
                          <label for="Nome">Tempo de viagem</label>
                          <input name="tempo_voo" class="form-control input-md" type="time" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="Nome">Companhia aérea</label>
                          <input name="cia_aerea" class="form-control input-md" type="text">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="Nome">Código de reserva</label>
                          <input name="cod_reserva" class="form-control input-md" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4 mb-1">
                        <div class="form-group">
                          <label for="Nome">Origem </label>
                          <input name="origem" class="form-control input-md" type="text" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="Nome">Destino </label>
                          <input name="destino" class="form-control input-md" type="text">
                        </div>
                      </div>
                      <div class="col-sm-4 mb-1">
                        <div class="form-group">
                          <label for="Nome">Escala</label>
                          <input type="text" class="form-control" name="local_escala">
                        </div>
                      </div>
                    </div>
                   
                    <div class="row">
                      <div class="col-sm-4 mb-1">
                        <div class="form-group">
                          <label for="Nome">Milha</label>
                          <select class="custom-select" id="verificaMilheiro" name="milha" onchange="temMilheiro(this)">
                            <option value="1">Sim</option>
                            <option value="0" selected>Não</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-4 mb-1">
                        <div class="form-group">
                          <label for="Nome">Milheiro</label>
                          <input type="text" disabled name="milheiro" id="milheiro" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-4 mb-1">
                        <div class="form-group">
                          <label for="Nome">Seguro viagem?</label>
                          <select class="custom-select" name="seguro_viagem">
                            <option value="1">Sim</option>
                            <option value="0" selected>Não</option>
                          </select>
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-sm-4 mb-1">
                        <div class="form-group">
                          <label for="Nome">Data emissão da passagem</label>
                          <input name="dt_emissao_passagem" required class="form-control input-md" type="date">
                        </div>
                      </div>
                      
                      <div class="col-sm-4 mb-1">
                        <div class="form-group">
                          <label for="Nome">Forma de pagamento</label>
                          <select class="custom-select" name="fk_fpagamento">
                            <?php foreach ($fpagamentos as $fpagamento): ?>
                              <option value="<?= $fpagamento->id_fpagamento ?>"><?= $fpagamento->descricao_fpagamento ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="Nome">Valor da Passagem</label>
                          <input name="valor_liquido" required class="form-control input-md" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="Nome">Observação</label>
                          <textarea name="obs" class="form-control input-md" rows="3"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row ml-0 mt-4">
                      <div class="col-sm-12 text-right">
                        <button id="Cadastrar" name="Cadastrar" class="btn btn-primary" type="submit"> Salvar </button>
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
  const temMilheiro = (elem) => {
    if ($('#verificaMilheiro').val() == 1) {
      $('#milheiro').prop('disabled', false);
    } else {
      $('#milheiro').prop('disabled', 'disabled');

    }
  }
</script>
<?= $this->endSection() ?>