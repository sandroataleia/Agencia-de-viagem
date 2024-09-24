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
                                            <h5><i class="fa-solid fa-user-pen"></i> CONFIGURAR PERFIL</h5>
                                        </div>
                                        <div class="col-sm-5 text-right">    
                                            <a class="btn btn-warning btn-sm" href="<?=base_url('usuario')?>"><i class="fa-solid fa-arrow-left"></i> VOLTAR</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                  <form method="post" action="<?=base_url('usuario/adicionar')?>">
                                    <div class="row">
                                      <div class="col-sm-6">
                                        <label for="name">CPF</label>
                                        <input type="text" class="form-control" value="<?=$usuario->cpf?>" name="cpf" readonly>
                                      </div>
                                      <div class="col-sm-6">
                                        <label for="name">Usuário</label>
                                        <input type="text" class="form-control" value="<?=$usuario->user?>" name="user" readonly>
                                      </div>
                                    </div>
                                    <div class="row mt-5">
                                      <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th>ID</th>
                                            <th>Página</th>
                                            <th>Descrição</th>
                                            <th>Selecionar</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php $i = 0; foreach($results as $result):?>
                                            <tr>
                                              <td><?=$result->id_perfil?></td>
                                              <td><?=$result->perfil?></td>
                                              <td><?=$result->descricao?></td>
                                              <td><input <?=$result->id_perfil == $result->fk_perfil ? 'checked' : ''?> onclick="addPerfil(<?=$result->id_perfil?>, <?=$id_usuario?>,<?=$i?>,<?=$result->id_perfil_usuario?>)"  type="checkbox" contextmenu="" class="form-control" name="id_perfil_usuario[]" id="id<?=$i?>"></td>
                                            </tr>
                                          <?php $i++; endforeach?>
                                        </tbody>
                                      </table>
                                    </div>
                                  </form>
                                </div> 
                            </div> 
                        </div>  
                    </div>
                </div>
            </div>
       </div>
    </div>
  </div>         

  <script>
  function addPerfil(id_perfil, id_usuario,i,id_perfil_usuario){
    if(document.getElementById("id"+i+"").checked){
      $.ajax({
       url: "<?=base_url('usuario/inserirPerfil')?>",
       type: 'post',
       data: {
           fk_perfil: id_perfil,
           fk_usuario: id_usuario
       },
       success: function(response){
        console.log( response );
      }
     });
    }else{
      $.ajax({
       url: "<?=base_url('usuario/excluirPerfil')?>",
      method: 'post',
       data:{
           id_perfil_usuario: id_perfil_usuario
       },
       success: function(response){
        console.log( response );
      }
     });
    }
     
  }
</script>

<?= $this->endSection() ?>

