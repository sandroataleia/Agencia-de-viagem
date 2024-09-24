<?= $this->extend('master') ?>

<?= $this->section('content') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <!-- Main content -->
            <div class="content">
              <div class="row">
                <div class="col-sm-12 text-right">
                  <a class="btn btn-warning btn-sm" href="<?=base_url('cliente')?>"><i class="fa-solid fa-arrow-left"></i> VOLTAR</a>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                          <div class="col-sm-12">
                            <h5>DADOS PESSOAIS</h5>
                            <hr />
                          </div>
                      </div>
                      <div class="row mb-2">
                      
                        <div class="col-sm-4"><strong>Nome: </strong><?=$cliente->nome?></div>
                        <div class="col-sm-4"><strong>Nascimento:</strong> <?=$cliente->dtnascimento?></div>
                        <div class="col-sm-4"><strong>Sexo:</strong> <?=$cliente->sexo == 'm' ? 'Masculino' : 'Feminino'?></div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-sm-4"><strong>CPF:</strong> <?=$cliente->cpf?></div>
                        <div class="col-sm-4"><strong>RG:</strong> <?=$cliente->rg?></div>
                        <div class="col-sm-4"><strong>Nacionalidade:</strong> <?=$cliente->nacionalidade?></div>
                      </div>                        
                      <div class="row mb-2">
                        <div class="col-sm-4"><strong>Passaporte:</strong> <?=$cliente->numero_passaporte?></div>
                        <div class="col-sm-4"><strong>Validade passaporte:</strong> <?=$cliente->validade_passaporte?></div>
                        <div class="col-sm-4"><strong>Telefone:</strong> <?=$cliente->telefone?></div>
                      </div>  
                      <div class="row mb-2">
                        <div class="col-sm-4"><strong>Email:</strong> <?=$cliente->email?></div>
                        <div class="col-sm-4"><strong>Contato Emergência:</strong> <?=$cliente->contato_emergencia?></div>
                        <div class="col-sm-4"><strong>Grau parentesco:</strong> <?=$cliente->grau_parentesco?></div>
                      </div> 
                      <div class="row mb-2">
                        <div class="col-sm-4"><strong>Fone Emergência:</strong> <?=$cliente->fone_emergencia?></div>
                      </div>
                      <div class="row mt-4">
                        <div class="col-sm-12">
                          <h5>ENDEREÇO PRINCIPAL</h5>
                          <hr />
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-sm-4"><strong>CEP:</strong> <?=$cliente->cep?></div>
                        <div class="col-sm-4"><strong>Endereço:</strong> <?=$cliente->endereco?></div>
                        <div class="col-sm-4"><strong>Número:</strong> <?=$cliente->numero?></div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-sm-4"><strong>Complemento:</strong> <?=$cliente->complemento?></div>
                        <div class="col-sm-4"><strong>Bairro:</strong> <?=$cliente->bairro?></div>
                        <div class="col-sm-4"><strong>Cidade:</strong> <?=$cliente->cidade?></div>
                      </div> 

                      <div class="row mb-2">
                        <div class="col-sm-4"><strong>Estado:</strong> <?=$cliente->estado?></div>
                        <div class="col-sm-4"><strong>País:</strong> <?=$cliente->pais?></div>
                      </div> 
                      <div class="row mt-4">
                          <div class="col-sm-12">
                            <h5>ENDEREÇO SECUNDÁRIO</h5>
                            <hr />
                          </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-sm-4"><strong>CEP:</strong> <?=$cliente->cepsec?></div>
                        <div class="col-sm-4"><strong>Endereço:</strong> <?=$cliente->enderecosec?></div>
                        <div class="col-sm-4"><strong>Número:</strong> <?=$cliente->numerosec?></div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-sm-4"><strong>Complemento:</strong> <?=$cliente->complementosec?></div>
                        <div class="col-sm-4"><strong>Bairro:</strong> <?=$cliente->bairrosec?></div>
                        <div class="col-sm-4"><strong>Cidade:</strong> <?=$cliente->cidadesec?></div>
                      </div> 
                      <div class="row mb-4">
                        <div class="col-sm-4"><strong>Estado:</strong> <?=$cliente->estadosec?></div>
                        <div class="col-sm-4"><strong>País:</strong> <?=$cliente->paissec?></div>
                      </div>
                      <div class="row mb-1">
                        <div class="col-sm-4">
                          <strong>CADASTRADO POR:</strong>
                        </div>
                        <div class="col-sm-4">
                          <strong>DATA ÚLTIMA ALTERAÇÃO:</strong>
                        </div>
                        <div class="col-sm-4">
                          <strong>ALTERADO POR:</strong>
                        </div>
                      </div>  
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-12">
                          <h5>MINHAS COMPRAS</h5>
                          <hr />
                        </div>
                      </div>
                      <table class="table table-responsive table-striped">
                        <thead>
                          <tr>
                            <th>Tipo</th>
                            <th>Data</th>
                            <th>pagamento</th>
                            <th>situação</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td></td>
                          </tr>
                        </tbody>
                      </table>
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
  <script>
     const setDadosModal = (valor) => {
    $("#id_venda_cancelar").val(valor);
  }
  </script>
<?= $this->endSection() ?>
