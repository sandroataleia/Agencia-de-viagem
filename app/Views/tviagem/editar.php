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
        <li class="breadcrumb-item active" aria-current="page"><a href="<?=base_url('tviagem')?>">Tipo de Viagens</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar</li>
      </ol>
    </nav>

    <section>
      <div class="card p-3">
        <form id="form_cad" method="post" action="<?=base_url('tviagem/update')?>">
        <div class="row">
          <div class="col-sm-4">
              <div class="form-group">
                <label for="Nome">Tipo<h11></h11></label>  
                <input id="id" name="id" value="<?=$result->id_tviagem?>"  type="hidden">
                  <input id="tipo" name="tipo" value="<?=$result->tipo?>" placeholder=""  class="form-control input-md"  type="text">
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                <label for="Nome">Descricao<h11></h11></label>  
                  <input id="descricao" name="descricao" value="<?=$result->descricao?>" class="form-control input-md"  type="text">
              </div>
            </div> 
          </div>
          <div class="row ml-0 mt-4">
            <div class="form-group">
              <label class="control-label" for="Cadastrar"></label>
              <button id="Cadastrar" name="Alterar" class="btn btn-primary" type="submit">Alterar</button>
              <button id="Cancelar" name="Cancelar" class="btn btn-warning" type="Reset">Limpar</button>
            </div>
          </div>
        </div>  
      </form>   
    </section>
  </div>
</div>
<?= $this->endSection() ?>
