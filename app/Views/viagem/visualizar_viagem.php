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
                      <h5><i class="fa-solid fa-plane"></i> VIAGEM</h5>
                    </div>
                    <div class="col-sm-5 text-right">
                      <a class="btn btn-warning btn-sm" href="<?= base_url('vendas') ?>"><i class="fa-solid fa-arrow-left"></i> VOLTAR</a>
                      <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalCancelar" onclick="setDadosModal(<?= $viagem->id_venda ?>)">
                        <i class="fa-regular fa-circle-xmark"></i>
                        Cancelar
                      </a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-4 mb-1">
                        <label for="Nome">Cliente</label>
                        <p><?= $viagem->nome ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4 mb-1">
                        <label for="Nome">Origem </label>
                        <p><?= $viagem->origem ?></p>
                      </div>
                      <div class="col-sm-4">
                        <label for="Nome">Destino </label>
                        <p><?= $viagem->destino ?></p>
                      </div>
                      <div class="col-sm-4 mb-1">
                        <label for="Nome">Escala</label>
                        <p><?= $viagem->local_escala ?></p>
                      </div>
                    </div>
                    <div class="row align-items-center">
                      <div class="col-sm-4 mb-1">
                        <label for="Nome">Data da Viagem</label>
                        <p><?= $viagem->data_viagem ?></p>
                      </div>
                      <div class="col-sm-4 mb-1">
                        <label for="Nome">Hora da viagem</label>
                        <p><?= $viagem->hora_viagem ?></p>
                      </div>
                      <div class="col-sm-4">
                        <label for="Nome">Companhia aérea</label>
                        <p><?= $viagem->cia_aerea ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <label for="Nome">Valor volta caução</label>
                        <p>R$ <?= str_replace('.', ',', $viagem->valor_voltacaucao) ?></p>
                      </div>
                      <div class="col-sm-4 mb-1">
                        <label for="Nome">Milheiro</label>
                        <p><?= $viagem->milheiro ?></p>
                      </div>
                      <div class="col-sm-4 mb-1">
                        <label for="Nome">Seguro viagem</label>
                        <p><?= $viagem->seguro_viagem == 1 ? 'Sim' : 'Não' ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <label for="Nome">Valor da Passagem</label>
                        <p>R$ <?= str_replace('.', ',', $viagem->valor_liquido) ?></p>
                      </div>
                      <div class="col-sm-4 mb-1">
                        <label for="Nome">Forma de pagamento</label>
                        <p><?= $viagem->descricao_fpagamento?></p>
                      </div>
                      <div class="col-sm-4 mb-1">
                        <label for="Nome">Data emissão da passagem</label>
                        <p><?= $viagem->dt_emissao_passagem ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <label for="Nome">Código de reserva</label>
                        <p><?= $viagem->cod_reserva ?></p>
                      </div>
                      <div class="col-sm-4">
                        <label for="Nome">Parceiro</label>
                        <p><?= $viagem->nome_parceiro ?></p>
                      </div>
                      <div class="col-sm-4">
                        <label for="Nome">Observação</label>
                        <p><?= $viagem->obs ?></p>
                      </div>
                    </div>
                  </div>
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