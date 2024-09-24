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
        <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url('financeiro/fpagamento')?>">Forma de pagamento</a></li>
        <li class="breadcrumb-item active" aria-current="current-page">Adicionar</li>
      </ol>
    </nav>

    <section>
      <div class="card p-3">
        <div class="form-group"> 
          <div class="col-md-12 control-label mb-2">
            <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
          </div>
        </div>
        <form action="<?=base_url('financeiro/fpagamento/adicionar')?>" method="post">
          <div class="row  ml-1 mb-2">
            <div class="col-sm-12">
              <div class="form-group">
                <label class="form-check-label" for="Nome">Cartão de crédito/débito?<h11></h11></label>  
                <input id="operadora_active" onclick="ocultar()" placeholder=""  class="form-check-input"  type="checkbox">
              </div>
            </div>
          </div>
          <div class="row">
            
            <div class="col-sm-4">
              <div class="form-group">
                <label for="Nome">Forma<h11>*</h11></label>  
                  <input id="forma" name="forma" placeholder=""  class="form-control input-md"  type="text">
              </div>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <label for="Nome">Descrição<h11>*</h11></label>  
                  <input id="descricao" name="descricao" placeholder="" required class="form-control input-md"  type="text">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group" id="operadora" style="display: none;">
                <label for="Nome" >Operadora Cartão<h11></h11></label>  
                <select name="operadora" class="form-control">
                  <option value="0">Selecione </option>
                  <?php foreach($operadoras as $operadora): ?>
                    <option value="<?=$operadora->id_operadora?>"><?=$operadora->operadora?></option>
                  <?php endforeach?>
                </select>
              </div>
            </div>
          </div>
          <div class="row ml-0 mt-4">
            <div class="form-group">
              <label class="control-label" for="Cadastrar"></label>
              <button id="Cadastrar" name="Cadastrar" class="btn btn-primary" type="submit">Cadastrar</button>
              <button id="Cancelar" name="Cancelar" class="btn btn-warning" type="Reset">Limpar</button>
            </div>
          </div>
        </div>  
      </form>   
    </section>
  </div>
</div>
<script>
let form = document.getElementById('form_cad');
  form.addEventListener('submit',async (event)=>
  {
      event.preventDefault();
      const formData = new FormData(form);
      const data = Object.fromEntries(formData);

      const response = await fetch('adicionar',{
          method  : 'POST',
          body    : formData,
      })
      .then(response=>response.json())
      .then(
          response => {
              if(JSON.stringify(response) == '["sucesso"]'){
                  Swal.fire({
                      position: "top-end",
                      icon: "success",
                      title: "Cadastro efetuado com sucesso!",
                      showConfirmButton: false,
                      timer: 1500
                    });
              }else{
                  console.log(JSON.stringify(response));
                  Swal.fire({
                      position: "top-end",
                      icon: "error",
                      title: "Item já cadastrado!",
                      showConfirmButton: false,
                      timer: 1500
                    });
                    document.getElementById('form_cad').reset();
              }
          }
      );
  })
  function ocultar() {    
        if (document.getElementById("operadora").style.display == "none") { 
            document.getElementById("operadora").style.display = "block";    
        } else {
            document.getElementById("operadora").style.display = "none";         
        }  
    }
</script>
<?= $this->endSection() ?>
