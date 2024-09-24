<?= $this->extend('master') ?>

<?= $this->section('content') ?>
   <!-- main content start -->
<div class="main-content">

  <!-- content -->
  <div class="container-fluid content-top-gap">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb my-breadcrumb">
        <li class="breadcrumb-item"><a href="<?=base_url('/')?>">Home</a></li>
        <li class="breadcrumb-item" aria-current="page">Financeiro</li>
        <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url('financeiro/opcartoes')?>">Operadoras de cartão</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar</li>
      </ol>
    </nav>

    <section>
      <?=$this->include('partials/message.php')?>
      <div class="card p-3">
        <form method="post" action="<?=base_url('financeiro/opcartoes/update')?>">
          <div class="row mb-3">
            <div class="col-sm-5">
              <div class="form-group">
                <label for="Nome">Nome <h11></h11></label>  
                <input type="hidden" value="<?=$result->id_operadora?>" name="id_operadora">
                  <input id="operadora" name="operadora" value="<?=$result->operadora?>" placeholder="" required class="form-control input-md"  type="text">
              </div>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <label for="Nome">CNPJ<h11></h11></label>  
                  <input id="cnpj" name="cnpj" placeholder="" value="<?=$result->cnpj?>" class="form-control input-md"  type="text">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="Nome">Dias repasse<h11></h11></label>  
                <input id="dias_repasse" value="<?=$result->dias_repasse?>" name="dias_repasse" class="form-control input-md"  type="number">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label for="CEP">CEP <h11>*</h11></label>
              <input id="cep" name="cep" value="<?=$result->cep?>" onblur="pesquisacep(cep.value)" placeholder="Apenas números" class="form-control input-md" type="text">
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <label for="name">Endereço</label>
                <input id="endereco" value="<?=$result->endereco?>" name="endereco" class="form-control input-md" placeholder=""  type="text">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <span class="input-group-addon">Nº <h11>*</h11></span>
                <input id="numero" name="numero" value="<?=$result->numero?>" class="form-control" placeholder=""   type="text">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <span class="input-group-addon">Bairro</span>
                <input id="bairro" name="bairro" value="<?=$result->bairro?>" class="form-control" placeholder=""  type="text">
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-sm-4">
              <div class="form-group">
                <span class="input-group-addon">Cidade</span>
                <input id="cidade" name="cidade" value="<?=$result->cidade?>" class="form-control" placeholder=""  type="text">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <span class="input-group-addon">Estado</span>
                <input id="estado" name="estado" value="<?=$result->estado?>" class="form-control" placeholder=""  type="text">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <span class="input-group-addon">País</span>
                <input id="pais" name="pais" value="<?=$result->pais?>" class="form-control" placeholder=""  type="text">
              </div>
            </div>
          </div>
          <div class="row ml-0 mt-4">
            <div class="form-group">
              <label class="control-label" for="Cadastrar"></label>
              <button id="Cadastrar" name="Cadastrar" class="btn btn-primary" type="submit">Alterar</button>
              <a href="<?=base_url('financeiro/opcartoes')?>" class="btn btn-warning">Cancelar</a>
            </div>
          </div>
        </div>  
      </form>   
    </section>
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
</script>
<?= $this->endSection() ?>
