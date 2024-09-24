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
                                <h5><i class="fa-solid fa-circle-plus"></i> CADASTRAR FUNCIONARIO</h5>
                            </div>
                            <div class="col-sm-5 text-right">    
                                <a class="btn btn-warning btn-sm" href="<?=base_url('funcionario')?>"><i class="fa-solid fa-arrow-left"></i> VOLTAR</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <form action="<?=base_url('funcionario/adicionar')?>" method="post">          
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
                                <input id="Nome" name="nome" placeholder="" required class="form-control input-md"  type="text">
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
                          <div class="col-sm-4 mb-3">
                            <div class="form-group">
                              <label for="Nome">CPF</label>  
                                <input name="cpf" placeholder="apenas números" required class="form-control input-md"  type="text">
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="Nome">RG</label>  
                                <input id="rg" name="rg" placeholder="" class="form-control input-md"  type="text">
                            </div>
                          </div>
                          <div class="col-sm-4 mb-3">
                            <div class="form-group">
                              <label for="prependedtext">Telefone</label>
                              <input id="telefone" name="telefone" class="form-control" placeholder="XX XXXXX-XXXX"  type="text" maxlength="13" >
                            </div>
                          </div>
                          
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <div class="form-group">
                                <label for="prependedtext">Email</label>
                                <input id="email" name="email" class="form-control" placeholder="email@site.com"  type="email">
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <div class="form-group">
                                <label for="prependedtext">Cargo</label>
                                <select name="fk_cargo" class="form-control">
                                  <?php foreach($cargos as $cargo):?>
                                  <option value="<?=$cargo->id_cargo?>"><?=$cargo->cargo?></option>
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
                            <label for="CEP">CEP </label>
                            <input name="cep" placeholder="Apenas números" onblur="pesquisacep(cep.value)" class="form-control input-md"  type="search" maxlength="8" pattern="[0-9]+$">
                          </div>
                          <div class="col-sm-5 mb-3">
                            <div class="form-group">
                              <label for="name">Endereço</label>
                              <input id="endereco" name="endereco" class="form-control input-md" placeholder=""  type="text">
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-group">
                              <label>Nº </label>
                              <input id="numero" name="numero" class="form-control" placeholder=""   type="text">
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label>Bairro</label>
                              <input id="bairro" name="bairro" class="form-control" placeholder=""  type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4 mb-3">
                            <div class="form-group">
                              <label>Cidade</label>
                              <input id="cidade" name="cidade" class="form-control" placeholder=""  type="text">
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label>Estado</label>
                              <input id="estado" name="estado" class="form-control" placeholder=""  type="text">
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label>País</label>
                              <input id="pais" name="pais" class="form-control" placeholder=""  type="text">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="row ml-0 mt-2">
                            <div class="form-group">
                              <label class="control-label" for="Cadastrar"></label>
                              <button id="Cadastrar" name="Cadastrar" class="btn btn-primary" type="submit">Cadastrar</button>
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
<script>
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
