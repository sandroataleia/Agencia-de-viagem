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
            <div class="row justify-content-center pt-5">
                <div class="col-sm-12 text-center">
                    <h1><i class="fa-solid fa-lock fa-6x "></i></h1>
                </div>
                <div class="col-sm-12 text-center mt-3">
                    <h1><strong><span class="text-danger">403 - Acesso não permitido!</strong></h1>
                </div>  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>
