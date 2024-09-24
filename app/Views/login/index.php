
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$title?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('plugins/fontawesome-free/css/all.min.css')?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('dist/css/adminlte.min.css')?>">
</head>
<body class="hold-transition bg-blue login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body">
        
        <div class="row mb-3 d-flex justify-content-center">
            <div class="col-sm-10">
                <img src="<?=base_url('images/logogrande.png')?>" class="img-fluid mt-2 mb-3">
            </div>
        </div>
        <form action="<?=base_url('logar')?>" method="post">
            <div class="row">
                <div class="col-sm-12 mb-3">
                    <label for="emailaddress" class="form-label">Usuário</label>
                    <input name="user" class="form-control" type="text" id="emailaddress" required="" placeholder="Seu usuário">
                </div>
                <div class="col-sm-12 ">
                    <label for="password" class="form-label">Senha</label>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" required name="password" class="form-control" placeholder="Sua senha">
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Acessar</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url('plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('dist/js/adminlte.min.js')?>"></script>
</body>
</html>
