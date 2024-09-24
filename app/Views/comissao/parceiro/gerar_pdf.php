<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pdf Document</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/pdf_style.css') ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body style="font-size: 12px; font-family: sans-serif !important;">
  <div style="width: 100%; height:70px;">
    <div style="width: 20%; float:left;">
      <img src='<?= base_url('images/logogrande.png') ?>' class='img-fluid'></td>
    </div>
    <div style="width: 80%;" class="text-right">
      <h6 style="margin-top: 20px;">COMISSÃO POR VENDAS</h6>
    </div>
  </div>
  <div style="width: 100%;">
      <div class="col-sm-12 p-1 pt-1" style="background-color: #DCDCDC;">
        <h6 class="mt-1"> Vendedor: <?=$vendedor->nome?></h6>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th>Código</th>
            <th>Data da venda</th>
            <th>Cliente</th>
            <th class="text-center">Valor</th>
          </tr>
        </thead>
        <tbody id="listRecords">
          <?php foreach ($results as $result): ?>
            <tr style="text-transform:uppercase">
              <td><?=$result->id_venda?></td>
              <td><?= date('d/m/Y',strtotime($result->data_venda)) ?></td>
              <td><?= $result->nome ?></td>
              <td class="text-right">R$ <?= str_replace('.',',',$result->valor_liquido) ?></td>
            <tr>
            <?php endforeach ?>
        </tbody>
      </table>
      <hr />
      <div style="width:100%;">
        <div style="width:600px;">

        </div>
        <div style="text-align: right;">
          <p><strong>Total de vendas: <span style="margin-left: 200px;"> R$: <?= number_format($vlrTotal,'2',',','.') ?></span></strong></p>
          <p><strong>Comissão total: <span style="margin-left: 200px;">R$: <?= number_format($vlrComissaoLiq,'2',',','.') ?></span></strong></p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>