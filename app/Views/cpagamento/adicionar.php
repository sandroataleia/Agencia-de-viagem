<?= $this->extend('master') ?>

<?= $this->section('content') ?>
   <!-- main content start -->
<div class="main-content">

  <!-- content -->
  <div class="container-fluid content-top-gap">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb my-breadcrumb">
        <li class="breadcrumb-item"><a href="<?=base_url('/')?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Financeiro</li>
        <li class="breadcrumb-item active" aria-current="page"><a href="<?=base_url('financeiro/cpagamento/')?>"> Condições de pagamento</a></li>
        <li class="breadcrumb-item active" aria-current="page">Adicionar</li>
      </ol>
    </nav>

    <section>
      <?=$this->include('partials/message')?>
      <div class="card p-3">
        <div class="form-group"> 
          <div class="col-md-12 control-label mb-2">
            <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
          </div>
        </div>
        <form action="<?=base_url('financeiro/cpagamento/adicionar')?>" method="post">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="Nome">Condição<h11>*</h11></label>  
                  <input id="condicao" name="condicao" placeholder=""  class="form-control input-md"  type="text">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="Nome">Prazo<h11>*</h11></label>  
                  <input id="prazo" name="prazo" placeholder="em dias"  class="form-control input-md"  type="number">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="Nome">Quantidade de parcelas<h11>*</h11></label>  
                  <input id="qtde_parcelas" name="qtde_parcelas" placeholder=""  class="form-control input-md"  type="number">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group" id="operadora">
                <label for="Nome" >Forma de pagamento<h11></h11></label>  
                <select name="id_fpagamento" class="form-control">
                  <?php foreach($formas as $forma): ?>
                    <option value="<?=$forma->id_fpagamento?>"><?=$forma->forma?></option>
                  <?php endforeach?>
                </select>
              </div>
            </div>
          </div>
          <div class="row ml-0 mt-4">
            <div class="form-group">
              <label class="control-label" for="Cadastrar"></label>
              <button id="Cadastrar" name="Cadastrar" class="btn btn-primary" type="submit">Cadastrar</button>
              <a href="<?=base_url('financeiro/cpagamento')?>" class="btn btn-warning">Cancelar</a>
            </div>
          </div>
        </div>  
      </form>   
    </section>
  </div>
</div>
<?= $this->endSection() ?>
