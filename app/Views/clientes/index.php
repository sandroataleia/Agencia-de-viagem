<?= $this->extend('master') ?>

<?= $this->section('content') ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <!-- Main content -->
            <div class="content">
              
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-7">
                                <h5><i class="fa fa-list"></i>  LISTA DE CLIENTES</h5>
                            </div>
                            <div class="col-sm-5 text-right">
                                <a class="btn btn-primary btn-sm mr-3" href="<?=base_url('cliente/formulario_cadastro')?>"><i class="fa fa-plus"></i> ADICIONAR</a>
                                <a class="btn btn-warning btn-sm" href=""><i class="fa fa-filter"></i> FILTRAR</a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <?=$this->include('template/message')?> 
                        <table class="table table-hover" id="datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Contato</th>
                                    <th>CPF</th>
                                    <th>Contato emergência</th>
                                    <th>Fone emergência</th>
                                    <th>Status</th>
                                    <th class="text-center">Ação</th>
                                </tr>
                                <tbody id="tbody">
                                    <?php foreach($results as $result):?>
                                    <tr>
                                        <td class="text-center"><?=$result->cpf?></td>
                                        <td onclick="verCliente(<?=$result->cpf?>)"><?=$result->nome?></td>
                                        <td onclick="verCliente(<?=$result->cpf?>)"><?=$result->telefone?></td>
                                        <td onclick="verCliente(<?=$result->cpf?>)"><?=$result->cpf?></td>
                                        <td onclick="verCliente(<?=$result->cpf?>)"><?=$result->contato_emergencia?></td>
                                        <td onclick="verCliente(<?=$result->cpf?>)"><?=$result->fone_emergencia?></td>
                                        <td><span class="badge <?=$result->status == 1 ? 'bg-success' : 'bg-danger'?> rounded-pill"><?=$result->status == 1 ? 'ativo' : 'inativo'?></span></td>
                                        <td class="text-center" style="width: 120px;">
                                          <a href="<?=base_url('cliente/documentos/'.$result->cpf)?>" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-file" title="Documentos"></i></a>
                                          <a href="<?=base_url('cliente/editar/'.$result->id_cliente)?>" class="btn btn-outline-warning btn-sm" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                                          <a href="#" onclick="excluir(<?=$result->id_cliente?>,'cliente')" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach?>
                                </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>      
        </div> 
    </div>   
 </div>
<script>
  const verCliente = (id) => {
    window.location = 'cliente/verCliente/'+id
  }
</script>
<?= $this->endSection() ?>

