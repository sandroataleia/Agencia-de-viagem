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
        <li class="breadcrumb-item active" aria-current="page"><a href="<?=base_url('financeiro/cpagar/')?>"> Contas a pagar</a></li>
        <li class="breadcrumb-item active" aria-current="page">Adicionar</li>
      </ol>
    </nav>

    <section>
      <div class="card p-3">
        <form method="post" action="<?=base_url('financeiro/cpagar/adicionar')?>">
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label for="Nome">Tipo</label>  
                  <select name="tipo" class="form-control">
                    <option value="pl">Prolabore</option>
                    <option value="im">Imposto</option>
                    <option value="dv">Despesa variável</option>
                    <option value="df">Despesa fixa</option>
                    <option value="gp">Gasto com pessoas</option>
                  </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="Nome">Descrição</label>  
                  <input id="cpf_usuario" name="cpf_usuario" class="form-control input-md" value="<?=session('cpf')?>"  type="hidden">
                  <input id="nome" name="nome" class="form-control input-md"  type="text">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="Nome">Data de vencimento</label>  
                  <input id="dt_vencimento" name="dt_vencimento" class="form-control input-md"  type="date">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="Nome">Valor</label>  
                  <input id="valor" name="valor" class="form-control input-md"  type="text">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="Nome">Status</label>  
                  <select name="situacao" class="form-control">
                    <option value="ab">Aberta</option>
                    <option value="vc">Vencida</option>
                    <option value="pg">Paga</option>
                  </select>
              </div>
            </div>
          </div>

          <div class="row ml-0 mt-3">
            <div class="col-sm-12">
              <label>Observações</label>
              <textarea class="form-control" name="obs" rows="5"></textarea>
            </div>  
          </div>

          <div class="row ml-0 mt-4">
            <div class="form-group">
              <label class="control-label" for="Cadastrar"></label>
              <button id="Cadastrar" name="Cadastrar" class="btn btn-primary" type="submit">Cadastrar</button>
              <a href="<?=base_url('financeiro/cpagar')?>" class="btn btn-warning">Voltar</a>
            </div>
          </div>
        </div>  
      </form>   
    </section>
  </div>
</div>

<?= $this->endSection() ?>
