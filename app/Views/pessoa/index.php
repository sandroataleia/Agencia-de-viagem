<?= $this->extend('master') ?>

<?= $this->section('content') ?>
   <!-- main content start -->
<div class="main-content">

<div class="container-fluid">
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Pessoas</li>
                </ol>
            </div>
            <h4 class="page-title">Lista de pessoas</h4>
        </div>
    </div>
</div>
<!-- end page title --> 
<div class="card">
    <div class="card-header">
        <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPessoa">
            <i class="mdi mdi-plus-circle me-2"></i></i> Adicionar 
        </a>
    </div>
    <div class="card-body">
    <table class="table table-centered table-striped dt-responsive nowrap w-100" id="datatable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Contato</th>
                <th>CPF</th>
                <th>Status</th>
                <th class="text-center">Ação</th>
            </tr>
            <tbody id="tbody">
                <?php foreach($results as $result):?>
                <tr>
                    <td class="text-center"><?=$result->id?></td>
                    <td><?=$result->nome?> <?=$result->sobrenome?></td>
                    <td><?=$result->telefone?></td>
                    <td><?=$result->cpf?></td>
                    <td><span class="badge <?=$result->status == 1 ? 'badge-success-lighten' : 'badge-danger-lighten'?>"><?=$result->status == 1 ? 'ativo' : 'inativo'?></span></td>
                    <td class="text-center">
                        <a href="#" onclick="buscaPessoa(<?=$result->id?>)" data-bs-toggle="modal" data-bs-target="#editPessoa" class="action-icon"><i data-bs-container="#tooltip-container2" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top" class="mdi mdi-square-edit-outline"></i></a>
                        <a href="#"class="action-icon" onclick="excluir(<?=$result->id?>)"><i class="mdi mdi-delete"></i></a>
                    </td>
                </tr>
                <?php endforeach?>
            </tbody>
        </thead>
    </table>
    </div>
</div>
</div>
<?php if(session('message')){?>
    <script>
        $.toast({
        text: '<?=session('message')?>',
        position: 'top-right',
        bgColor: '#32CD32	',
        stack: false
        })
    </script>
<?php }?>
<?php include_once('adicionar.php');?>
<?php include_once('editar.php');?>
<script>
    function carregaPessaEdit(id){
        alert(id);
    }

    function excluir(id){
        if(confirm('Tem certeza que deseja excluir esta pessoa?')){
            window.location='pessoa/excluir/'+id;
        }
    }
</script>
<?= $this->endSection() ?>

