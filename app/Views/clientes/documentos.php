<?= $this->extend('master') ?>

<?= $this->section('content') ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <h5><i class="fa-regular fa-folder-open"></i> Arquivos de <strong><?=$cliente->nome?></strong></h5>
                                        </div>
                                        <div class="col-sm-5 text-right">
                                            <a class="btn btn-warning btn mr-3" href="<?=base_url('cliente')?>">
                                              <i class="fa-solid fa-arrow-left"></i>
                                              VOLTAR
                                            </a>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">
                                              <i class="fa-solid fa-plus"></i> Pasta
                                            </button>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <?=$this->include('template/message')?>
                                    <div class="row" style="min-height: 50px;">
                                      <?php foreach($pastas as $pasta):?>
                                        <div class="col-sm-2">
                                          <div style="width: 100%;" class="text-center">
                                            <a href="javascript:void(0)" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fa-solid fa-folder fa-2x"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                              <a class="dropdown-item" href="<?=base_url('cliente/pasta/'.$pasta->id_pasta)?>"><i class="fa-solid fa-folder-open"></i> Abrir pasta</a>
                                              <a class="dropdown-item" href="javascript:void(0)" onclick="excluirPasta(<?=$pasta->id_pasta?>)"><i class="fa-solid fa-trash-can"></i> Excluir pasta</a>
                                            </div>
                                          </div>
                                          <div style="width: 100%;" class="text-center">
                                            <?=$pasta->descricao_pasta?>
                                          </div>
                                        </div>
                                      <?php endforeach?>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
 <?=$this->include('clientes/pasta_modal.php')?>

 <script>
  const excluirPasta = (id) => {
   if(confirm('Ao excluir esta pasta seus respectivos arquivos serão excluídos também. Deseja continuar?')){
    window.location = "<?=base_url()?>/cliente/excluir_pasta/"+id;
   }
  }
 </script>
 <?= $this->endSection() ?>

