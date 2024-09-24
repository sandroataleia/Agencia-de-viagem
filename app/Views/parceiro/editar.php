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
                                <h5><i class="fa fa-pen-to-square"></i> EDITAR CLIENTE</h5>
                            </div>
                            <div class="col-sm-5 text-right">    
                                <a class="btn btn-warning btn-sm" href="<?=base_url('cliente')?>"><i class="fa-solid fa-arrow-left"></i> VOLTAR</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <?=$this->include('template/message')?>
                      <span class="mt-2 mb-2"><h4>Dados Pessoais</h4></span>
                      <hr class="mb-4" />
                      <form method="post" action="<?=base_url('cliente/update')?>">
                        <div class="row">
                          <div class="col-sm-6 mb-1">
                            <div class="form-group">
                              <label for="Nome">Nome <h11></h11></label> 
                                <input name="ultima_alteracao" value="<?=session('id')?>"  type="hidden">
                                <input type="hidden" value="<?=$cliente->id_cliente?>" name="id_cliente" >
                                <input id="Nome" name="nome" placeholder="" value="<?=$cliente->nome?>" required class="form-control input-md"  type="text">
                            </div>
                          </div> 
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label for="Nome">Nascimento<h11></h11></label>  
                              <input id="dtnasc" value="<?=$cliente->dtnascimento?>" name="dtnascimento" placeholder="DD/MM/AAAA" class="form-control input-md"  type="date" maxlength="10">
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label for="name">Sexo</label>
                              <select class="form-control" name="sexo">
                                <option value="m" <?=$cliente->sexo == 'm' ? 'selected' : ''?>>Masculino</option>
                                <option value="f" <?=$cliente->sexo == 'f' ? 'selected' : ''?>>Feminino</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4">  
                            <div class="form-group">
                              <label for="Nome">Nacionalidade<h11></h11></label>  
                                <input value="<?=$cliente->nacionalidade?>" name="nacionalidade" required class="form-control input-md"  type="text">
                            </div>
                          </div>
                          <div class="col-sm-4">  
                            <div class="form-group">
                              <label for="Nome">CPF <h11></h11></label>  
                                <input value="<?=$cliente->cpf?>" name="cpf" placeholder="apenas números" required class="form-control input-md"  type="text">
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="Nome">RG <h11></h11></label>  
                                <input id="rg" name="rg" value="<?=$cliente->rg?>" placeholder="" class="form-control input-md"  type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label for="Nome">Passaporte<h11></h11></label>  
                              <input id="numero_passaporte" value="<?=$cliente->numero_passaporte?>" name="numero_passaporte" placeholder="" class="form-control input-md"  type="text">
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label for="Nome">Validade passaporte<h11></h11></label>  
                              <input id="validade_passaporte" value="<?=$cliente->validade_passaporte?>" name="validade_passaporte" class="form-control input-md"  type="date">
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label for="prependedtext">Telefone <h11></h11></label>
                              <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                              <input name="telefone" value="<?=$cliente->telefone?>" class="form-control" placeholder="XX XXXXX-XXXX"  type="text" maxlength="13" >
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <div class="form-group">
                                <label for="prependedtext">Email <h11></h11></label>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input id="email" name="email" value="<?=$cliente->email?>" class="form-control" placeholder="email@site.com"  type="email">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <div class="form-group">
                                <label for="prependedtext">Contato emergência <h11></h11></label>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input id="contato_emergencia" value="<?=$cliente->contato_emergencia?>" name="contato_emergencia" class="form-control" placeholder="Nome do contato"  type="text">
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <div class="form-group">
                                <label for="prependedtext">Grau de parentesco <h11></h11></label>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input id="grau_parentesco" value="<?=$cliente->grau_parentesco?>" name="grau_parentesco" class="form-control" placeholder="Nome do contato"  type="text">
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="prependedtext">Telefone emergência <h11></h11></label>
                              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                              <input id="fone_emergencia" value="<?=$cliente->fone_emergencia?>" name="fone_emergencia" class="form-control" placeholder="XX XXXXX-XXXX"  type="text" maxlength="13">
                            </div>
                          </div>
                        </div>
                        <span class="mt-3 mb-2"><h4>Endereço Principal</h4></span>
                        <hr class="mb-4" />
                        <div class="row">
                          <div class="col-sm-4">
                            <label for="CEP">CEP <h11></h11></label>
                            <input value="<?=$cliente->cep?>" placeholder="Apenas números" onblur="pesquisacep(cep.value)" class="form-control input-md"  type="search" maxlength="8" pattern="[0-9]+$">
                          </div>
                          <div class="col-sm-8">
                            <div class="form-group">
                              <label for="name">Endereço</label>
                              <input id="endereco" value="<?=$cliente->endereco?>" name="endereco" class="form-control input-md" placeholder=""  type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <span class="input-group-addon">Número <h11></h11></span>
                              <input id="numero" name="numero" value="<?=$cliente->numero?>" class="form-control" placeholder=""   type="text">
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <span class="input-group-addon">Complemento <h11></h11></span>
                              <input id="complemento" name="complemento" value="<?=$cliente->complemento?>" class="form-control" placeholder=""   type="text">
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <span class="input-group-addon">Bairro</span>
                              <input id="bairro" name="bairro" value="<?=$cliente->bairro?>" class="form-control" placeholder=""  type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <span class="input-group-addon">Cidade</span>
                              <input id="cidade" name="cidade" value="<?=$cliente->cidade?>" class="form-control" placeholder=""  type="text">
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <span class="input-group-addon">Estado</span>
                              <input id="estado" name="estado" value="<?=$cliente->estado?>" class="form-control" placeholder=""  type="text">
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <span class="input-group-addon">País</span>
                              <input id="pais" name="pais" value="<?=$cliente->pais?>" class="form-control" placeholder=""  type="text">
                            </div>
                          </div>
                        </div>
                        <span class="mt-3 mb-2"><h4>Endereço Secundário</h4></span>
                        <hr class="mb-4" />
                        <div class="row">
                          <div class="col-sm-4">
                            <label for="CEP">CEP <h11></h11></label>
                            <input id="cepsec" name="cepsec" value="<?=$cliente->cepsec?>" onblur="pesquisacep1(cep1.value)" placeholder="Apenas números" class="form-control input-md" type="text">
                          </div>
                          <div class="col-sm-8">
                            <div class="form-group">
                              <label for="name">Endereço</label>
                              <input id="enderecosec" name="enderecosec" value="<?=$cliente->enderecosec?>" class="form-control input-md" placeholder=""  type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <span class="input-group-addon">Número <h11></h11></span>
                              <input id="numerosec" name="numerosec" value="<?=$cliente->numerosec?>" class="form-control" placeholder=""   type="text">
                            </div>
                          </div> 
                          <div class="col-sm-4">
                            <div class="form-group">
                              <span class="input-group-addon">Complemento <h11></h11></span>
                              <input id="complementosec" name="complementosec" value="<?=$cliente->complementosec?>" class="form-control" placeholder=""   type="text">
                            </div>
                          </div> 
                          <div class="col-sm-4">
                            <div class="form-group">
                              <span class="input-group-addon">Bairro</span>
                              <input id="bairrosec" name="bairrosec" value="<?=$cliente->bairrosec?>" class="form-control" placeholder=""  type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <span class="input-group-addon">Cidade</span>
                              <input id="cidadesec" name="cidadesec" value="<?=$cliente->cidadesec?>" class="form-control" placeholder=""  type="text">
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <span class="input-group-addon">Estado</span>
                              <input id="estadosec" name="estadosec" value="<?=$cliente->estadosec?>" class="form-control" placeholder=""  type="text">
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <span class="input-group-addon">País</span>
                              <input id="pasisec" name="paissec" value="<?=$cliente->paissec?>" class="form-control" placeholder=""  type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row ml-0 mt-4">
                          <div class="form-group">
                            <button class="btn btn-primary" type="submit">Alterar</button>
                          </div>
                        </div>
                      </div>  
                    </form> 
                </div>
              </div>
          </div>
    </div>
  </div>
<script type="module" src="<?=base_url('js/funcoes.js')?>"></script>
<script>
cadastrar(document.getElementById('form_cliente'),'adicionar');

function meu_callback(conteudo) {
if (!("erro" in conteudo)) {
   //Atualiza os campos com os valores.
   document.getElementById('endereco').value=(conteudo.logradouro);
   document.getElementById('bairro').value=(conteudo.bairro);
   document.getElementById('cidade').value=(conteudo.localidade);
   document.getElementById('estado').value=(conteudo.uf);
} //end if.
else {
   alert("CEP não encontrado.");
}
}

function pesquisacep(valor) {

//Nova variável "cep" somente com dígitos.
var cep = valor.replace(/\D/g, '');

//Verifica se campo cep possui valor informado.
if (cep !== "") {

   //Expressão regular para validar o CEP.
   var validacep = /^[0-9]{8}$/;

   //Valida o formato do CEP.
   if(validacep.test(cep)) {

       //Preenche os campos com "..." enquanto consulta webservice.
       document.getElementById('endereco').value="...";
       document.getElementById('bairro').value="...";
       document.getElementById('cidade').value="...";
       document.getElementById('estado').value="...";
       //Cria um elemento javascript.
       var script = document.createElement('script');

       //Sincroniza com o callback.
       script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

       //Insere script no documento e carrega o conteúdo.
       document.body.appendChild(script);

   } //end if.
   else {
       alert("Formato de CEP inválido.");
   }
} //end if.
}
</script>
<?= $this->endSection() ?>
