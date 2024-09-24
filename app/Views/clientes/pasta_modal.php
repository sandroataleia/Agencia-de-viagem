<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-circle-plus"></i> Adicionar Pasta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url('cliente/adicionar_pasta')?>">
        <div class="modal-body">
          
            <div>
              <label for="name">Nome da pasta</label>
              <input type="hidden" value="<?=$cliente->cpf?>" name="cpf" class="form-control">
              <input type="text" name="descricao_pasta" class="form-control">
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