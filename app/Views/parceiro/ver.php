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
                <div class="col-sm-6">
                  <a href="" class="btn btn-primary">Minhas compras</a>
                </div>
                <div class="col-sm-6 text-right">
                  <a class="btn btn-warning btn-sm"; href="<?=base_url('cliente')?>"><i class="fa-solid fa-arrow-left"></i> VOLTAR</a>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-header bg-cyan">
                        <div class="row">
                            <div class="col-sm-7">
                                <h5> DADOS PESSOAIS</h5>
                            </div>
                            <div class="col-sm-5 text-right">    
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <div class="row mb-3">
                        <div class="col-sm-5"><strong>Nome:</strong></div>
                        <div class="col-sm-7"><?=$cliente->nome?></div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-sm-5"><strong>Nascimento:</strong></div>
                        <div class="col-sm-7"><?=$cliente->dtnascimento?></div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-sm-5"><strong>Sexo:</strong></div>
                        <div class="col-sm-7"><?=$cliente->sexo == 'm' ? 'Masculino' : 'Feminino'?></div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-sm-5"><strong>CPF:</strong></div>
                        <div class="col-sm-7"><?=$cliente->cpf?></div>
                      </div>                        
                      <div class="row mb-3">
                        <div class="col-sm-5"><strong>RG:</strong></div>
                        <div class="col-sm-7"><?=$cliente->rg?></div>
                      </div>   
                      <div class="row mb-3">
                        <div class="col-sm-5"><strong>Nacionalidade:</strong></div>
                        <div class="col-sm-7"><?=$cliente->nacionalidade?></div>
                      </div>   
                      <div class="row mb-3">
                        <div class="col-sm-5"><strong>Passaporte:</strong></div>
                        <div class="col-sm-7"><?=$cliente->numero_passaporte?></div>
                      </div>  
                      <div class="row mb-3">
                        <div class="col-sm-5"><strong>Validade passaporte:</strong></div>
                        <div class="col-sm-7"><?=$cliente->validade_passaporte?></div>
                      </div> 
                      <div class="row mb-3">
                        <div class="col-sm-5"><strong>Telefone:</strong></div>
                        <div class="col-sm-7"><?=$cliente->telefone?></div>
                      </div>    
                      <div class="row mb-3">
                        <div class="col-sm-5"><strong>Email:</strong></div>
                        <div class="col-sm-7"><?=$cliente->email?></div>
                      </div>     
                      <div class="row mb-3">
                        <div class="col-sm-5"><strong>Contato Emergência:</strong></div>
                        <div class="col-sm-7"><?=$cliente->contato_emergencia?></div>
                      </div>  
                      <div class="row mb-3">
                        <div class="col-sm-5"><strong>Grau parentesco:</strong></div>
                        <div class="col-sm-7"><?=$cliente->grau_parentesco?></div>
                      </div>  
                      <div class="row mb-1">
                        <div class="col-sm-5"><strong>Fone Emergência:</strong></div>
                        <div class="col-sm-7"><?=$cliente->fone_emergencia?></div>
                      </div> 
                      <div class="row mb-1">
                        <div class="col-sm-5"><strong>Cadastrado por:</strong></div>
                        <div class="col-sm-7"><?=$cliente->fone_emergencia?></div>
                      </div>
                      <div class="row mb-1">
                        <div class="col-sm-5"><strong>Útima alteração:</strong></div>
                        <div class="col-sm-7"><?=$cliente->fone_emergencia?></div>
                      </div>  
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-header bg-gradient-blue">
                      <div class="row">
                          <div class="col-sm-7">
                            <h5>ENDEREÇOS</h5>
                          </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <span class="mt-2 mb-2"><h4>Principal</h4></span>
                      <hr class="mb-4" />
                      <div class="row mb-3">
                        <div class="col-sm-4"><strong>CEP:</strong></div>
                        <div class="col-sm-8"><?=$cliente->cep?></div>
                      </div> 
                      <div class="row mb-3">
                        <div class="col-sm-4"><strong>Endereço:</strong></div>
                        <div class="col-sm-8"><?=$cliente->endereco?></div>
                      </div> 
                      <div class="row mb-3">
                        <div class="col-sm-4"><strong>Número:</strong></div>
                        <div class="col-sm-8"><?=$cliente->numero?></div>
                      </div> 
                      <div class="row mb-3">
                        <div class="col-sm-4"><strong>Complemento:</strong></div>
                        <div class="col-sm-8"><?=$cliente->complemento?></div>
                      </div> 
                      <div class="row mb-3">
                        <div class="col-sm-4"><strong>Bairro:</strong></div>
                        <div class="col-sm-8"><?=$cliente->bairro?></div>
                      </div>   
                      <div class="row mb-3">
                        <div class="col-sm-4"><strong>Cidade:</strong></div>
                        <div class="col-sm-8"><?=$cliente->cidade?></div>
                      </div>      
                      <div class="row mb-3">
                        <div class="col-sm-4"><strong>Estado:</strong></div>
                        <div class="col-sm-8"><?=$cliente->estado?></div>
                      </div>    
                      <div class="row mb-2">
                        <div class="col-sm-4"><strong>País:</strong></div>
                        <div class="col-sm-8"><?=$cliente->pais?></div>
                      </div>
                      <div class="mt-5 mb-2"><h4>Secundário</h4></div>
                      <hr class="mb-4" />
                      <div class="row mb-3">
                          <div class="col-sm-4"><strong>CEP:</strong></div>
                          <div class="col-sm-8"><?=$cliente->cepsec?></div>
                        </div> 
                        <div class="row mb-3">
                          <div class="col-sm-4"><strong>Endereço:</strong></div>
                          <div class="col-sm-5"><?=$cliente->enderecosec?></div>
                        </div> 
                        <div class="row mb-3">
                          <div class="col-sm-4"><strong>Número:</strong></div>
                          <div class="col-sm-8"><?=$cliente->numerosec?></div>
                        </div> 
                        <div class="row mb-3">
                        <div class="col-sm-4"><strong>Complemento:</strong></div>
                        <div class="col-sm-8"><?=$cliente->complementosec?></div>
                      </div> 
                        <div class="row mb-3">
                          <div class="col-sm-4"><strong>Bairro:</strong></div>
                          <div class="col-sm-8"><?=$cliente->bairrosec?></div>
                        </div>      
                        <div class="row mb-3">
                          <div class="col-sm-4"><strong>Cidade:</strong></div>
                          <div class="col-sm-8"><?=$cliente->cidadesec?></div>
                        </div>    
                        <div class="row mb-3">
                          <div class="col-sm-4"><strong>Estado:</strong></div>
                          <div class="col-sm-8"><?=$cliente->estadosec?></div>
                        </div>    
                        <div class="row mb-3">
                          <div class="col-sm-4"><strong>País:</strong></div>
                          <div class="col-sm-8"><?=$cliente->paissec?></div>
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
