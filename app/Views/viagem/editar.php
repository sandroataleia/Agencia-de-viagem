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
                      <h5><i class="fa fa-plus-circle"></i> EDITAR VIAGEM</h5>
                    </div>
                    <div class="col-sm-5 text-right">
                      <a class="btn btn-warning btn-sm" href="<?= base_url('viagem') ?>"><i class="fa-solid fa-arrow-left"></i> VOLTAR</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <form action="<?= base_url('viagem/alterar') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-sm-4 mb-1">
                        <div class="form-group">
                          <label for="Nome">CPF cliente</label>
                          <input value="<?= $viagem->id_viagem ?>" type="hidden">
                          <input name="ultima_alteracao" value="<?= session('id') ?>" type="hidden">
                          <input value="<?= $viagem->cpf ?>" readonly class="form-control input-md" type="number">
                        </div>
                      </div>
                      <div class="col-sm-8 mb-1">
                        <div class="form-group">
                          <label for="Nome">Cliente</label>
                          <input id="nomcli" value="<?= $viagem->nome ?>" class="form-control input-md" type="text" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row align-items-center">
                      <div class="col-sm-2 mb-1">
                        <div class="form-group">
                          <label for="Nome">Data da ida</label>
                          <input value="<?= $viagem->dt_ida ?>" name="dt_ida" class="form-control input-md" type="date" required>
                        </div>
                      </div>
                      <div class="col-sm-2 mb-1">
                        <div class="form-group">
                          <label for="Nome">Hora da ida</label>
                          <input value="<?= $viagem->hora_ida ?>" name="hora_ida" class="form-control input-md" type="time" required>
                        </div>
                      </div>
                      <div class="col-sm-4 mb-1">
                        <div class="form-group">
                          <label for="Nome">Data volta</label>
                          <input value="<?= $viagem->dt_volta ?>" name="dt_volta" id="dt_volta" class="form-control input-md" type="date">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="Nome">Companhia aérea</label>
                          <input value="<?= $viagem->cia_aerea ?>" name="cia_aerea" class="form-control input-md" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4 mb-1">
                        <div class="form-group">
                          <label for="Nome">Origem </label>
                          <input value="<?= $viagem->origem ?>" name="origem" class="form-control input-md" type="text" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="Nome">Destino </label>
                          <input value="<?= $viagem->destino ?>" name="destino" class="form-control input-md" type="text">
                        </div>
                      </div>
                      <div class="col-sm-4 mb-1">
                        <div class="form-group">
                          <label for="Nome">Escala</label>
                          <input value="<?= $viagem->local_escala ?>" type="text" class="form-control" name="local_escala">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4 mb-1">
                        <div class="form-group">
                          <label for="Nome">Volta flexível</label>
                          <select class="custom-select" name="volta_flexivel">
                            <option <?= $viagem->volta_flexivel == 1 ? 'selected' : '' ?> value="1">Sim</option>
                            <option <?= $viagem->volta_flexivel == 0 ? 'selected' : '' ?> value="0">Não</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-4 mb-1">
                        <div class="form-group">
                          <label for="Nome">Volta caução</label>
                          <select class="custom-select" name="volta_caucao">
                            <option <?= $viagem->volta_caucao == 1 ? 'selected' : '' ?> value="1">Sim</option>
                            <option <?= $viagem->volta_caucao == 0 ? 'selected' : '' ?> value="0">Não</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="Nome">Valor volta caução</label>
                          <input value="<?= $viagem->valor_voltacaucao ?>" name="valor_voltacaucao" class="form-control input-md" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4 mb-1">
                        <div class="form-group">
                          <label for="Nome">Milheiro</label>
                          <select class="custom-select" name="milheiro">
                            <option <?= $viagem->milheiro == 1 ? 'selected' : '' ?> value="1">Sim</option>
                            <option <?= $viagem->milheiro == 0 ? 'selected' : '' ?> value="0">Não</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-4 mb-1">
                        <div class="form-group">
                          <label for="Nome">Possui seguro viagem?</label>
                          <select class="custom-select" name="seguro_viagem">
                            <option <?= $viagem->seguro_viagem == 1 ? 'selected' : '' ?> value="1">Sim</option>
                            <option <?= $viagem->seguro_viagem == 0 ? 'selected' : '' ?> value="0">Não</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="Nome">Código reserva</label>
                          <input value="<?= $viagem->cod_reserva ?>" name="cod_reserva" class="form-control input-md" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="Nome">Valor da viagem</label>
                          <input value="<?= $viagem->valor_liquido ?>" name="valor_liquido" class="form-control input-md" type="text">
                        </div>
                      </div>
                      <div class="col-sm-4 mb-1">
                        <div class="form-group">
                          <label for="Nome">Forma de pagamento</label>
                          <select class="custom-select" name="fk_fpagamento">
                            <?php foreach ($fpagamentos as $fpagamento): ?>
                              <option <?= $viagem->fk_fpagamento == $fpagamento->id_fpagamento ? 'selected' : '' ?> value="<?= $fpagamento->id_fpagamento ?>"><?= $fpagamento->descricao ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-4 mb-1">
                        <div class="form-group">
                          <label for="Nome">Data emissão da passagem</label>
                          <input value="<?= $viagem->dt_emissao_passagem ?>" name="dt_emissao_passagem" class="form-control input-md" type="date">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="Nome">Observação</label>
                          <textarea name="obs" class="form-control input-md" rows="3"><?= $viagem->obs ?></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row ml-0 mt-4">
                      <div class="form-group">
                        <label class="control-label" for="Cadastrar"></label>
                        <button id="Cadastrar" name="Cadastrar" class="btn btn-primary" type="submit">Alterar</button>
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