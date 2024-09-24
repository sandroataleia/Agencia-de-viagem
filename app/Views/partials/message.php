
<?php if(session('error')): ?>
    <div class="alert alert-danger alert-dismissible border-0 fade show" role="alert">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        <?=session('error')?>
    </div>
<?php endif ?>

<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible border-0 fade show" role="alert">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        <?=session('success')?>
    </div>
<?php endif ?>

<?php if(session('warning')): ?>
    <div class="alert alert-warning alert-dismissible border-0 fade show" role="alert">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        <?=session('warning')?>
    </div>
<?php endif ?>

<?php if(session('alert')): ?>
    <div class="alert alert-warning alert-dismissible border-0 fade show" role="alert">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        <?=session('alert')?>
    </div>
<?php endif ?>

          