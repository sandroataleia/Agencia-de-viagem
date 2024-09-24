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
                                            <h5><i class="fa fa-plus-circle"></i> CADASTRAR PARCEIRO</h5>
                                        </div>
                                        <div class="col-sm-5 text-right">    
                                            <a class="btn btn-warning btn-sm" href="<?=base_url('cliente')?>"><i class="fa-solid fa-arrow-left"></i> VOLTAR</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                  <?=$this->include('template/message')?>
                                  <form action="<?=base_url('cliente/adicionar')?>"  method="post" enctype="multipart/form-data">
                                    <div class="row">
                                      <div class="col-sm-6 mb-1">
                                        <div class="form-group">
                                          <label for="Nome">Nome <h11></h11></label>  
                                            <input name="fk_usuario" value="<?=session('id')?>"  type="hidden">
                                            <input id="Nome" name="nome" placeholder="nome completo" required class="form-control input-md"  type="text">
                                        </div>
                                      </div>
                                      <div class="col-sm-6 mb-1">
                                        <div class="form-group">
                                          <label for="Nome">CPF <h11></h11></label>  
                                            <input name="cpf" placeholder="apenas números" class="form-control input-md"  type="number" required>
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <label for="Nome">RG <h11></h11></label>  
                                            <input id="rg" name="rg" placeholder="" class="form-control input-md"  type="text">
                                        </div>
                                      </div>
                                      <div class="col-sm-6 mb-1">
                                        <div class="form-group">
                                          <label for="prependedtext">Telefone <h11></h11></label>
                                          <label class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></label>
                                          <input name="telefone" class="form-control" type="text" maxlength="13" >
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row ml-0 mt-2">
                                      <div class="form-group">
                                        <label class="control-label" for="Cadastrar"></label>
                                        <button id="Cadastrar" name="Cadastrar" class="btn btn-primary" type="submit">Cadastrar</button>
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
//########################## BUSCAR CEP DEO ENDEREÇO PRINCIPAL #########################
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
}

//########################## BUSCAR CEP DEO ENDEREÇO SECUNDÁRIO #########################
function meu_callbacksec(conteudo) {
  if (!("erro" in conteudo)) {
    //Atualiza os campos com os valores.
    document.getElementById('enderecosec').value=(conteudo.logradouro);
    document.getElementById('bairrosec').value=(conteudo.bairro);
    document.getElementById('cidadesec').value=(conteudo.localidade);
    document.getElementById('estadosec').value=(conteudo.uf);
  } //end if.
  else {
    alert("CEP não encontrado.");
  }
}

function pesquisacepsec(valorsec) {

//Nova variável "cep" somente com dígitos.
var cepsec = valorsec.replace(/\D/g, '');

//Verifica se campo cep possui valor informado.
if (cepsec !== "") {

  //Expressão regular para validar o CEP.
  var validacepsec = /^[0-9]{8}$/;

  //Preenche os campos com "..." enquanto consulta webservice.
  document.getElementById('enderecosec').value="...";
  document.getElementById('bairrosec').value="...";
  document.getElementById('cidadesec').value="...";
  document.getElementById('estadosec').value="...";
  //Cria um elemento javascript.
  var script = document.createElement('script');

  //Sincroniza com o callback.
  script.src = '//viacep.com.br/ws/'+ cepsec + '/json/?callback=meu_callback';

  //Insere script no documento e carrega o conteúdo.
  document.body.appendChild(script);

} //end if.
}
</script>
<?= $this->endSection() ?>
