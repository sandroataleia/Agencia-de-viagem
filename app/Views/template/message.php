
<?php if(session('error')): 
  echo "
  <script>
    $(function() {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
      });
      Toast.fire({
        icon: 'error',
        title: '".session('error')."'
      })
    });
  </script>";
endif ?>

<?php if(session('success')): 
  echo "
  <script>
    $(function() {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
      });
      Toast.fire({
        icon: 'success',
        title: '".session('success')."'
      })
    });
  </script>";
 endif ?>

<?php if(session('warning')): 
  echo "
  <script>
    $(function() {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
      });
      Toast.fire({
        icon: 'warning',
        title: '".session('warning')."'
      })
    });
  </script>";
endif ?>

<?php if(session('alert')): 
  echo "
  <script>
    $(function() {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
      });
      Toast.fire({
        icon: 'warning',
        title: '".session('warning')."'
      })
    });
  </script>";
endif ?>

          