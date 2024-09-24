<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-circle-plus"></i> Adicionar Documento/s</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url('cliente/adicionarDocumentos')?>" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
                <label>Adicionar documentos</label>
                <input type="file" name="images[]" class="form-control">
                <input type="hidden" value="<?=$id_pasta?>" name="fk_pasta">
            </div>
            <div class="row mt-2">
                <label>Descrição do documento</label>
                <input type="text" class="form-control" name="descricao_arquivo">
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Adicionar</button>
        </div>
      </form>
    </div>
  </div>
</div>