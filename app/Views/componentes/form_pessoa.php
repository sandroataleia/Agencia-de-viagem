<?= $this->extend('master') ?>

<?= $this->section('content') ?>
   <!-- main content start -->
<div class="main-content">

  <!-- content -->
  <div class="container-fluid content-top-gap">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb my-breadcrumb">
        <li class="breadcrumb-item"><a href="<?=base_url('/')?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Adicionar Cliente</li>
      </ol>
    </nav>

    <section>
      <div class="card p-3">
        <div class="form-group"> 
          <div class="col-md-12 control-label mb-4">
            <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
          </div>
        </div>
        <span class="mt-2 mb-2"><h4>Dados Pessoais</h4></span>
        <form id="form_cliente">
          <div class="row">
          <div class="col-sm-2">
              
              <div class="form-group">
                <label for="Nome">CPF <h11>*</h11></label>  
                  <input id="cpf" name="cpf" onblur="verificaCadastro(this.value)" placeholder="apenas números" required class="form-control input-md"  type="text">
              </div>
            </div>  
          </div>
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label for="Nome">Nome <h11>*</h11></label>  
                  <input id="nome" name="nome" placeholder="" required class="form-control input-md"  type="text">
              </div>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <label for="Nome">Sobrenome <h11>*</h11></label>  
                  <input id="sobrenome" name="sobrenome" placeholder="" required class="form-control input-md"  type="text">
              </div>
            </div>
            <div class="col-sm-2">
              
              <div class="form-group">
                <label for="Nome">Nascimento<h11>*</h11></label>  
                <input id="dtnasc" name="dtnascimento" placeholder="DD/MM/AAAA" class="form-control input-md"  type="date" maxlength="10">
              </div>
            </div>
            <div class="col-sm-2">
            
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
            
            <div class="col-sm-4">
              
              <div class="form-group">
                <label for="Nome">RG <h11>*</h11></label>  
                  <input id="rg" name="rg" placeholder="" class="form-control input-md"  type="text">
              </div>
            </div>
            <div class="col-sm-4">
              
              <div class="form-group">
                <label for="Nome">Passaporte<h11>*</h11></label>  
                <input id="numero_passaporte" name="numero_passaporte" placeholder="" class="form-control input-md"  type="text">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label for="prependedtext">Telefone <h11>*</h11></label>
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input id="telefone" name="telefone" class="form-control" placeholder="XX XXXXX-XXXX"  type="text" maxlength="13" >
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <div class="form-group">
                  <label for="prependedtext">Email <h11>*</h11></label>
                  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                  <input id="email" name="email" class="form-control" placeholder="email@site.com"  type="email">
                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <div class="form-group">
                  <label for="prependedtext">Contato emergência <h11>*</h11></label>
                  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                  <input id="contato_emergencia" name="contato_emergencia" class="form-control" placeholder="Nome do contato"  type="text">
                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="prependedtext">Telefone emergência <h11>*</h11></label>
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input id="fone_emergencia" name="fone_emergencia" class="form-control" placeholder="XX XXXXX-XXXX"  type="text" maxlength="13">
              </div>
            </div>
          </div>
          <hr class="mt-4" />
          <span class="mt-3 mb-2"><h4>Endereço Principal</h4></span>
          <div class="row">
            <div class="col-sm-5">
              <label for="CEP">CEP <h11>*</h11></label>
              <input id="cep" name="cep" placeholder="Apenas números" class="form-control input-md"  type="search" maxlength="8" pattern="[0-9]+$">
            </div>
            <div class="col-sm-4">
              <button type="button" class="btn btn-primary mt-4" onclick="pesquisacep(cep.value)">Pesquisar</button>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-sm-7">
              <div class="form-group">
                <label for="name">Endereço</label>
                <input id="endereco" name="endereco" class="form-control input-md" placeholder=""  type="text">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <span class="input-group-addon">Nº <h11>*</h11></span>
                <input id="numero" name="numero" class="form-control" placeholder=""   type="text">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <span class="input-group-addon">Bairro</span>
                <input id="bairro" name="bairro" class="form-control" placeholder=""  type="text">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <span class="input-group-addon">Cidade</span>
                <input id="cidade" name="cidade" class="form-control" placeholder=""  type="text">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <span class="input-group-addon">Estado</span>
                <input id="estado" name="estado" class="form-control" placeholder=""  type="text">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <span class="input-group-addon">País</span>
                <input id="pais" name="pais" class="form-control" placeholder=""  type="text">
              </div>
            </div>
          </div>
          <hr class="mt-4" />
          <span class="mt-3 mb-2"><h4>Endereço Secundário</h4></span>
          <div class="row">
            <div class="col-sm-5">
              <label for="CEP">CEP <h11>*</h11></label>
              <input id="cepsec" name="cepsec" placeholder="Apenas números" class="form-control input-md" type="text">
            </div>
            <div class="col-sm-4">
              <button type="button" class="btn btn-primary mt-4" onclick="pesquisacep1(cep1.value)">Pesquisar</button>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-sm-7">
              <div class="form-group">
                <label for="name">Endereço</label>
                <input id="enderecosec" name="enderecosec" class="form-control input-md" placeholder=""  type="text">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <span class="input-group-addon">Nº <h11>*</h11></span>
                <input id="numerosec" name="numerosec" class="form-control" placeholder=""   type="text">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <span class="input-group-addon">Bairro</span>
                <input id="bairrosec" name="bairrosec" class="form-control" placeholder=""  type="text">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <span class="input-group-addon">Cidade</span>
                <input id="cidadesec" name="cidadesec" class="form-control" placeholder=""  type="text">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <span class="input-group-addon">Estado</span>
                <input id="estadosec" name="estadosec" class="form-control" placeholder=""  type="text">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <span class="input-group-addon">País</span>
                <input id="pasisec" name="paissec" class="form-control" placeholder=""  type="text">
              </div>
            </div>
          </div>
          <div class="row ml-0 mt-4">
            <div class="form-group">
              <label class="control-label" for="Cadastrar"></label>
              <button id="Cadastrar" name="Cadastrar" class="btn btn-primary" type="submit">Cadastrar</button>
              <button id="Cancelar" name="Cancelar" class="btn btn-warning" type="Reset">Cancelar</button>
            </div>
          </div>
        </div>  
      </form>   
    </section>
  </div>
</div>
<script type="module" src="<?=base_url('js/funcoes.js')?>"></script>
<script>

const verificaCadastro = (cpf) =>{
  $.ajax({
         type: 'get',
         url: "http://localhost/loja/pessoa/verificar/"+cpf,
         success: function (data) {
            let response = JSON.parse(data);

            $('#nome').val(response['nome']);
            $('#sobrenome').val(response['sobrenome']);
            $('#dtnasc').val(response['dtnascimento']);
            $('#sexo').attr(response['sexo']);
            console.log(response['dtnascimento']);
         }
  });

}


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
