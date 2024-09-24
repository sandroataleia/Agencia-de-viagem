<div class="modal fade" id="addPessoa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Adicionar Pessoa</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
              <div class="modal-body">
                <form id="form_pessoa" method="post" action="<?=base_url('pessoa/adicionar')?>">
                <!-- main content start -->
                <div class="main-content">
                <!-- content -->
                  <div class="container-fluid content-top-gap">
                    <section>
                      <div class="card p-3">
                        
                          <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="Nome">CPF <h11>*</h11></label>  
                                    <input id="cpf" name="cpf" onblur="verificaCadastro(this.value)" placeholder="apenas números" required class="form-control input-md"  type="text">
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="Nome">RG <h11></h11></label>  
                                    <input id="rg" name="rg" placeholder="" class="form-control input-md"  type="text">
                                </div>
                            </div>
                            <div class="col-sm-5 mb-3">
                              <div class="form-group">
                                <label for="Nome">Nome <h11>*</h11></label>  
                                  <input id="nome" name="nome" placeholder="" required class="form-control input-md"  type="text">
                              </div>
                            </div>
                            <div class="col-sm-7 mb-3">
                              <div class="form-group">
                                <label for="Nome">Sobrenome <h11>*</h11></label>  
                                  <input id="sobrenome" name="sobrenome" placeholder="" required class="form-control input-md"  type="text">
                              </div>
                            </div>
                            
                          </div>  
                          <div class="row">
                            
                            <div class="col-sm-3 mb-3">
                              <div class="form-group">
                                <label for="prependedtext">Telefone <h11></h11></label>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input id="telefone" name="telefone" class="form-control" placeholder="XX XXXXX-XXXX"  type="text" maxlength="13" >
                              </div>
                            </div>
                            <div class="col-sm-3 mb-3">
                              <div class="form-group">
                                <div class="form-group">
                                  <label for="prependedtext">Email <h11></h11></label>
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                  <input id="email" name="email" class="form-control" placeholder="email@site.com"  type="email">
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="form-group">
                                <label for="Nome">Nascimento<h11></h11></label>  
                                <input id="dtnasc" name="dtnascimento" placeholder="DD/MM/AAAA" class="form-control input-md"  type="date" maxlength="10">
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="form-group">
                                <label for="name">Sexo</label>
                                <select class="form-control" name="sexo">
                                  <option value="m">Masculino</option>
                                  <option value="f">Feminino</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-3 mb-3">
                              <label for="CEP">CEP <h11></h11></label>
                              <input id="cep" name="cep" placeholder="Apenas números" onblur="pesquisacep(this.value)" class="form-control input-md"  type="search" maxlength="8" pattern="[0-9]+$">
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label for="name">Endereço</label>
                                <input id="endereco" name="endereco" class="form-control input-md" placeholder=""  type="text">
                              </div>
                            </div>
                            <div class="col-sm-2 mb-3">
                              <div class="form-group">
                                <span class="input-group-addon">Nº <h11></h11></span>
                                <input id="numero" name="numero" class="form-control" placeholder=""   type="text">
                              </div>
                            </div>
                            <div class="col-sm-3 mb-3">
                              <div class="form-group">
                                <span class="input-group-addon">Bairro</span>
                                <input id="bairro" name="bairro" class="form-control" placeholder=""  type="text">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4 mb-1">
                              <div class="form-group">
                                <span class="input-group-addon">Cidade</span>
                                <input id="cidade" name="cidade" class="form-control" placeholder=""  type="text">
                              </div>
                            </div>
                            <div class="col-sm-4 mb-1">
                              <div class="form-group">
                                <span class="input-group-addon">Estado</span>
                                <input id="estado" name="estado" class="form-control" placeholder=""  type="text">
                              </div>
                            </div>
                            <div class="col-sm-4 mb-1">
                              <div class="form-group">
                                <span class="input-group-addon">País</span>
                                <input id="pais" name="pais" class="form-control" placeholder=""  type="text">
                              </div>
                            </div>
                          </div>
                        </div>  
                      
                    </section>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="form-group">
                  <label class="control-label" for="Cadastrar"></label>
                  <button id="Cadastrar" name="Cadastrar" class="btn btn-primary" type="submit">Cadastrar</button>
                  <button name="Cancelar" data-bs-dismiss="modal" class="btn btn-warning">Cancelar</button>
                </div>
              </div>
            </form>   
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
