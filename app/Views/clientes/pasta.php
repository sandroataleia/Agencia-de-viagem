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
                                            <a class="btn btn-warning btn mr-3" href="<?=base_url('cliente/documentos/'.$cliente->cpf)?>">
                                              <i class="fa-solid fa-arrow-left"></i>
                                              VOLTAR
                                            </a>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">
                                              <i class="fa-solid fa-plus"></i> Arquivos
                                            </button>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <?=$this->include('template/message')?>
                                    <div class="row" style="min-height: 50px;">
                                      <?php foreach($documentos as $documento):?>
                                        <div class="col-sm-2">
                                          <div style="width: 100%;" class="text-center">
                                            <a  href="javascript:void(0)" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?=base_url('uploads/'.$documento->filename)?>" class="img-fluid img-produto"></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                              <a class="dropdown-item" href="<?=base_url('uploads/'.$documento->filename)?>"><i class="fa-solid fa-file"></i> Abrir arquivo</a>
                                              <a class="dropdown-item" href="javascript:void(0)" onclick="excluirArquivo(<?=$documento->id_arqdocumentos?>)"><i class="fa-solid fa-trash-can"></i> Excluir arquivo</a>
                                            </div>
                                          </div>
                                          <div style="width: 100%;" class="text-center mt-2">
                                            <?=$documento->descricao_arquivo?>
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
 <?=$this->include('clientes/arquivo_modal.php')?>

 <script>
  const excluirArquivo = (id) => {
   if(confirm('Tem certeza que deseja excluir este arquivo?')){
    window.location = "<?=base_url()?>/cliente/excluir_arquivo/"+id;
   }
  }
 </script>
 <?= $this->endSection() ?>

