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
        <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url('financeiro/fpagamento')?>">Formas de pagamento</a></li>
        <li class="breadcrumb-item active" aria-current="current-page">Editar</li>
      </ol>
    </nav>

    <section>
      <div class="card p-3">
        <form id="form_cad" method="post" action="<?=base_url('financeiro/fpagamento/update')?>">
          <div class="row">
            
            <div class="col-sm-4">
              <div class="form-group">
                <label for="Nome">Forma<h11>*</h11></label>  
                  <input id="id_fpagamento" name="id_fpagamento" value="<?=$result->id_fpagamento?>"  type="hidden">
                  <input id="forma" name="forma" value="<?=$result->forma?>" placeholder=""  class="form-control input-md"  type="text">
              </div>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <label for="Nome">Descrição<h11>*</h11></label>  
                  <input id="descricao" name="descricao" value="<?=$result->descricao?>" placeholder="" required class="form-control input-md"  type="text">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group <?=$result->operadora == 0 ? 'd-none' : ''?>" id="operadora" >
                <label for="Nome" >Operadora Cartão<h11></h11></label>  
                <select name="operadora" class="form-control">
                  <option value="0" <?=$result->operadora == 0 ? 'selected' : ''?>>Nenhumas</option>
                  <?php foreach($operadoras as $operadora): ?>
                    <option value="<?=$operadora->id_operadora?>" <?=$result->operadora == $operadora->id_operadora ? 'selected' : ''?>><?=$operadora->operadora?></option>
                  <?php endforeach?>
                </select>
              </div>
            </div>
          </div>
          <div class="row ml-0 mt-4">
            <div class="form-group">
              <label class="control-label" for="Cadastrar"></label>
              <button id="Cadastrar" name="Alterar" class="btn btn-primary" type="submit">Alterar</button>
              <a href="<?=base_url('financeiro/fpagamento')?>" class="btn btn-warning">Cancelar</a>
            </div>
          </div>
        </div>  
      </form>   
    </section>
  </div>
</div>
<?= $this->endSection() ?>
