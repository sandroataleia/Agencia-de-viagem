<?= $this->extend('master') ?>

<?= $this->section('content') ?>
   <!-- main content start -->
<div class="main-content">

  <!-- content -->
  <div class="container-fluid content-top-gap">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb my-breadcrumb">
        <li class="breadcrumb-item"><a href="<?=base_url('/')?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Viagens</li>
        <li class="breadcrumb-item active" aria-current="page"><a href="<?=base_url('tviagem/')?>"> Tipo de Viagem</a></li>
        <li class="breadcrumb-item active" aria-current="page">Adicionar</li>
      </ol>
    </nav>

    <section>
      <div class="card p-3">
        <div class="form-group"> 
          <div class="col-md-12 control-label mb-2">
            <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
          </div>
        </div>
        <form id="form_cad">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="Nome">Tipo<h11>*</h11></label>  
                  <input id="tipo" name="tipo" placeholder=""  class="form-control input-md"  type="text">
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                <label for="Nome">Descricao<h11></h11></label>  
                  <input id="descricao" name="descricao" placeholder=""  class="form-control input-md"  type="text">
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
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Cadastro efetuado com sucesso!",
                showConfirmButton: false,
                timer: 1000
              });
              document.getElementById('form_cad').reset();
          }
      );
  })
</script>
<?= $this->endSection() ?>
