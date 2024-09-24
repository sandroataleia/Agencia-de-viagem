 <!-- jQuery UI CSS -->
 <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
 <!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!-- jQuery UI JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>

<style>
    .ui-autocomplete{
   z-index: 1050 !important;
}
</style>

<div class="modal fade" id="modalproduto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary" style="Color:#FFF;">
                <h4 class="modal-title" id="myModalLabel">Buscar Produto</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="name">Digite o nome do produto</label>
                            <input type="text" class="form-control" id="despro" autofocus>
                        </div>
                    </div>
                                
                </div>
                <table class="table table-stripped">
                    <thead>
                        <th>Codigo</th>
                        <th>Descrição</th>
                        <th>Derivação</th>
                        <th>Qtde</th>
                        <th>Valor</th>
                        <th>Ação</th>
                    </thead>
                    <tbody id="lista">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



     <script type='text/javascript'>
   $( "#despro" ).autocomplete({
        scroll:true,
          source: function( request, response ) {
  
             // Fetch data
             $.ajax({
              url: "<?=site_url('ipedcompras/getProdutos')?>",
                type: 'post',
                dataType: "html",
                data: {
                   search: request.term
                },
                success: function( data ) {
                  
                    $("#lista").html(data);
                  
                }
             });
          },
        }); 
  </script>