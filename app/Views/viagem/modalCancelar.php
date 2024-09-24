<!-- Modal -->
<div class="modal fade" id="modalCancelar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cancelamento de venda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url('vendas/cancelar')?>">
        <div class="modal-body">
          <label>Motivo Cancelamento</label>
          
          <input type="hidden" name="id_venda" id="id_venda_cancelar">
          <textarea class="form-control" rows="3" name="motivo_cancelamento" required></textarea>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Confirmar</button>
        </div>
      </form>
    </div>
  </div>
</div>