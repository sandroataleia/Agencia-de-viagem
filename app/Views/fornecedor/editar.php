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
                                <h5><i class="fa fa-pen-to-square"></i> EDITAR FUNCIONARIO</h5>
                            </div>
                            <div class="col-sm-5 text-right">    
                                <a class="btn btn-warning btn-sm" href="<?=base_url('funcionario')?>"><i class="fa-solid fa-arrow-left"></i> VOLTAR</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <form action="<?=base_url('funcionario/update')?>" method="post">
                        <div class="row">
                          <div class="col-sm-12">
                            <span class="mt-3"><h4>Dados pessoais</h4></span>
                            <hr class="mb-3" />
                          </div>
                        </div>
                      
                        <div class="row">
                          <div class="col-sm-6 mb-3">
                            <div class="form-group">
                              <label for="Nome">Nome</label>  
                                <input id="Nome" name="nome" value="<?=$result->nome?>" required class="form-control input-md"  type="text" required>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label for="Nome">Nascimento</label>  
                              <input id="dtnasc" name="dtnascimento" value="<?=$result->dtnascimento?>" class="form-control input-md"  type="date" maxlength="10">
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label for="name">Sexo</label>
                              <select class="form-control" name="sexo">
                                <option value="m" <?='m' == $result->sexo ? 'selected' : ''?>>Masculino</option>
                                <option value="f" <?='f' == $result->sexo ? 'selected' : ''?>>Feminino</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-3 mb-3">
                            <div class="form-group">
                              <label for="Nome">CPF</label>  
                                <input name="cpf" value="<?=$result->cpf?>" required class="form-control input-md"  type="text">
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label for="Nome">RG </label>  
                                <input id="rg" name="rg" value="<?=$result->rg?>" class="form-control input-md"  type="text">
                            </div>
                          </div>
                          <div class="col-sm-3 mb-3">
                            <div class="form-group">
                              <label for="prependedtext">Telefone <h11></h11></label>
                              <input id="telefone" name="telefone" class="form-control" value="<?=$result->telefone?>" type="text" maxlength="13" >
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <div class="form-group">
                                <label for="prependedtext">Email <h11></h11></label>
                                <input id="email" name="email" class="form-control" value="<?=$result->email?>" type="email">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6 mb-3">
                            <div class="form-group">
                              <label for="prependedtext">Salário<h11></h11></label>
                              <input id="salario" name="salario" class="form-control" value="<?=$result->salario?>"  type="text">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <div class="form-group">
                                <label for="prependedtext">Cargo<h11></h11></label>
                                <select name="fk_cargo" class="form-control">
                                  <?php foreach($cargos as $cargo):?>
                                    <option value="<?=$cargo->id_cargo?>" <?=$cargo->id_cargo == $result->fk_cargo ? 'selected' : ''?>><?=$cargo->cargo?></option>
                                  <?php endforeach?>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 mt-2">
                            <span class="mt-3"><h4>Endereço</h4></span>
                            <hr class="mb-3" />
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-2">
                            <label for="CEP">CEP</label>
                            <input name="cep" value="<?=$result->cep?>" onblur="pesquisacep(cep.value)" class="form-control input-md"  type="search" maxlength="8" pattern="[0-9]+$">
                          </div>
                          <div class="col-sm-5 mb-3">
                            <div class="form-group">
                              <label for="name">Endereço</label>
                              <input id="endereco" name="endereco" class="form-control input-md" value="<?=$result->endereco?>" type="text">
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-group">
                            <label for="name">Nº</label>
                              <input id="numero" name="numero" class="form-control" value="<?=$result->numero?>" type="text">
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label for="name">Bairro</label>
                              <input id="bairro" name="bairro" class="form-control" value="<?=$result->bairro?>" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4 mb-3">
                            <div class="form-group">
                              <label for="name">Cidade</label>
                              <input id="cidade" name="cidade" class="form-control" value="<?=$result->cidade?>" type="text">
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="name">Estado</label>
                              <input id="estado" name="estado" class="form-control" value="<?=$result->estado?>" type="text">
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="name">País</label>
                              <input id="pais" name="pais" class="form-control" value="<?=$result->pais?>"  type="text">
                            </div>
                          </div>
                        </div>   
                        <div class="row">
                          <div class="row ml-0 mt-2">
                            <div class="form-group">
                              <label class="control-label" for="Cadastrar"></label>
                              <button id="Cadastrar" name="Cadastrar" class="btn btn-primary" type="submit">Alterar</button>
                            </div>
                          </div>
                        </div>  
                      </form>
                    </div>
                </div>
            </div>
        </div>                    
    </div>
</div>
<?= $this->endSection() ?>
