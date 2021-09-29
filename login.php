<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Civil Servant Data Capture| Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
 
  <link rel="stylesheet" href="../csdcapp/plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../csdcapp/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../csdcapp/plugins/toastr/toastr.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../csdcapp/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../csdcapp/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-danger">
    <div class="card-header text-center">
      <a href="" class="h1"><img src="dist/img/csdc.png" alt="CSDC Logo" width="300"/></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post">
        <div class="input-group mb-3">
          <input id="username" name="username" type="text" required class="form-control" placeholder="CS Number">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="password" name="password" type="password" required class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button id="login" type="button" class="btn btn-primary btn-block"> <div id="loader" class="spinner-border spinner-border-sm d-none" role="status">
  <span class="sr-only">Loading...</span>
</div> Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <span class="text-primary btn toastrDefaultInfo">I forgot my password</span>
      </p>
     
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../csdcapp/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../csdcapp/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="../csdcapp/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../csdcapp/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="../csdcapp/dist/js/adminlte.min.js"></script>

<script>
$(function() {

    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.toastrDefaultInfo').click(function() {
      toastr.info('Contact SITA Administrator for assistance.')
    });
   
  });

$(document).on("click", "#login", function () {
    var username = $("#username").val();
    var password = $("#password").val();

    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    document.getElementById("loader").classList.remove("d-none");

    if(username !== "" || password !== ""){
        $.ajax({
        url: "http://localhost/csdcapp/functions/login.php",
        type: "post",
        data: {
          login: 1,
          username: username,
          password: password,
        },
        dataType: 'json',
        success: function (response) {
          console.log(response);
          document.getElementById("loader").classList.add("d-none");
          $("#username").val("");
          $("#password").val("");

          if(response.error){
            toastr.error(response.error)

          }else{
            window.location.replace("http://localhost/csdcapp");
          }
        },
      });
    }else{
      toastr.error("You cannot submit an empty form");
      document.getElementById("loader").classList.add("d-none");
    }
   
});
</script>

</body>
</html>
