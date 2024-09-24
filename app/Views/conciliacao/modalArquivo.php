<div class="modal fade" id="modalArquivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Escolha o tipo de conciliação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <a href="<?=base_url('conciliacao/manual')?>" class="btn btn-primary btn-block">Concilição manual</a>
          </div>
          <div class="col-md-6">
            <a href="<?=base_url('conciliacao/automatica')?>" class="btn btn-primary btn-block">Concilição automática</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>