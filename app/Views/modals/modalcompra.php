<style>
    .ui-autocomplete{
        z-index: 1050 !important;
        max-height: 200px;
        max-width: 470px;
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
        /* add padding to account for vertical scrollbar */
        padding-right: 20px;
    } 
</style>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<div class="modal fade" id="modalcompra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-primary" style="Color:#FFF;">
                <h4 class="modal-title" id="myModalLabel">Novo Pedido de Compra</h4>
            </div>
            <div class="modal-body">
                <form method="post" action='<?=base_url()?>pedido_compra/create'>
                    <div class="form-group">
                        <label for="codfor">CNPJ Fornecedor</label>
                        <input class="form-control" type="hidden" id="codfor" value='0' name="codfor">
                        <input class="form-control" type="text" id="cnpjfor" value='0' name="cnpjfor" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nomfor">Fornecedor</label>
                        <input type="text" class="form-control" name="nomfor" autofocus="true" id="autocompleteuser" required>
                        
                    </div>
                    <div class="form-group">
                        <label for="datped">Data</label>
                        <input type="date" class="form-control" name="datped">
                        <label for="vlrliq"></label>
                        <input type="hidden" class="form-control" name="vlrliq" value="0">
                    </div>
                    <div class="form-group">
                        <label for="cond_pag">Condição de Pagamento</label>
                        <select class="form-control" name="condpag">
                            <option value="1">A vista</option>
                            <option value="2">Duplicata</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="obs">Observação</label>
                        <textarea class="form-control" name="obs"></textarea>
                    </div>
                    
                <div class="form-group mt-5">
                    <input type="submit" class="btn btn-primary btn-block btn lg" value="CONFIRMAR">
                </div>
            </form>
        </div>
    </div>
</div>
<script type='text/javascript'>
   $(document).ready(function(){
     // Initialize
     $( "#autocompleteuser" ).autocomplete({

        source: function( request, response ) {


           // Fetch data
           $.ajax({
              url: "<?=site_url('pedido_compra/getFornecedor')?>",
              type: 'post',
              dataType: "json",
              data: {
                 search: request.term
              },
              success: function( data ) {

                 response( data.data );
              }
           });
        },
        select: function (event, ui) {
           // Set selection
           $('#autocompleteuser').val(ui.item.label); // display the selected text
           $('#codfor').val(ui.item.value); // save selected id to input
           $('#cnpjfor').val(ui.item.cnpjfor); // save selected id to input
           return false;
        },
        focus: function(event, ui){
          $( "#autocompleteuser" ).val( ui.item.label );
          $( "#codfor" ).val( ui.item.value );
          $('#cnpjfor').val(ui.item.cnpjfor); // save selected id to input
          return false;
        },
      }); 
   }); 
   </script> 