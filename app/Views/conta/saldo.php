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
                        <h5><i class="fa fa-list"></i> SALDO DAS CONTAS</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Banco</th>
                                    <th>Agencia</th>
                                    <th>Tipo conta</th>
                                    <th>Conta</th>
                                    <th>Saldo inicial</th>
                                    <th>Saldo atual</th>
                                    <th>Cheque especial</th>
                                    <th>Status</th>
                                </tr>
                                <tbody id="tbody">
                                    <?php foreach($results as $result):?>
                                        <tr>
                                            <td class="text-center"><?=$result->id_conta?></td>
                                            <td><?=$result->nome?></td>
                                            <td><?=$result->agencia?></td>
                                            <td><?=$result->descricao_tipo?></td>
                                            <td><?=$result->numero_conta?></td>
                                            <td>R$ <?=number_format($result->saldo_inicial,'2',',','.')?></td> 
                                            <td>R$ <?=number_format($result->saldo_atual,'2',',','.')?></td>
                                            <td>R$ <?=number_format($result->cheque_especial,'2',',','.')?></td>
                                            <td class="text-center"><span class="badge <?=$result->status == 1 ? 'bg-success' : 'bg-danger'?> rounded-pill"><?=$result->status == 1 ? 'ativo' : 'inativo'?></span></td>
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
    function excluir(id){
        if(confirm('Tem certeza que deseja excluir este item?')){
            window.location='conta/excluir/'+id;
        }
    }
</script>
<?= $this->endSection() ?>

