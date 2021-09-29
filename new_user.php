<!DOCTYPE html>
<html lang="en">
<!-- head -->
<?php session_start(); 

if(isset($_SESSION["userdata"]))
{
	  $user = $_SESSION["userdata"];
    $cs_no = $user->username;
    $role = $user->role;
    $fullname = $user->fullname;
    $sex = $user->sex;
    $email = $user->email;
    $phone = $user->phone;
    $status = $user->status;
    if($role == "admin"){

    }else{
      header("location: /csdcapp");
    }
}else{
  header("location: /csdcapp/login.php");
}
?>
<?php include "{$_SERVER['DOCUMENT_ROOT']}/csdcapp/partials/_head.php";?>


<body class="hold-transition sidebar-mini">

<div class="wrapper">
  <!-- Navbar -->
  <?php include "{$_SERVER['DOCUMENT_ROOT']}/csdcapp/partials/_top_navbar.php";?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php 
    if($role == "admin"){
      include "{$_SERVER['DOCUMENT_ROOT']}/csdcapp/partials/_admin_sidebar.php";
    }else if($role == "user"){
      include "{$_SERVER['DOCUMENT_ROOT']}/csdcapp/partials/_sidebar.php";
    }
  ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/csdcapp">Home</a></li>
              <li class="breadcrumb-item"><a href="/csdcapp/system_users.php">System Users</a></li>
              <li class="breadcrumb-item active">New User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
     
      <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <!-- <div class="card-header">
                <h3 class="card-title">Register New User</h3>
              </div> -->
              <div class="card-body p-3">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#biodata">
                      <button type="button" class="step-trigger" role="tab" aria-controls="biodata" id="biodata-trigger">
                        <span class="bs-stepper-label">Register New User</span>
                      </button>
                    </div>
                  </div>
                  <div class="line"></div>
                  <br />
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div id="biodata" class="content" role="tabpanel" aria-labelledby="biodata-trigger">
                    
                      <div class="row">
                          <div class="col-12 col-sm-5"> 
                              <div class="form-group d-flex flex-row">
                                <input type="text" class="form-control" id="cs_no" name="cs_no" placeholder="Enter CS Number to Auto Fill Form"> 
                                <input id="autofill" type="button" name="autofill" class="btn btn-info" value="Auto Fill">
                              </div>
                           </div>
                      </div>
                      <div class="row">
                          <div class="col-12 col-sm-4"> 
                              <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter CS Number" >
                              </div>
                           </div>
                           <div class="col-12 col-md-8"> 
                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Surname Firstname" >
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        
                        <div class="col-12 col-md-4">
                          <div class="form-group">
                            <label for="firstname">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="First Name" >
                          </div>
                        </div>
                        <div class="col-12 col-md-8">
                           <div class="form-group">
                             <label for="othername">Email</label>
                             <input type="email" class="form-control" id="email" name="email" placeholder="Email" >
                           </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-12 col-md-3"> 
                          <div class="form-group">
                              <label for="sex">Sex</label>
                              <select id="sex" name="sex" class="form-control custom-select">
                                <option selected disabled>Select your gender</option>
                                  <option>MALE</option>
                                  <option>FEMALE</option>
                              </select>
                          </div>
                        </div>

                        <div class="col-12 col-md-1"> 
                          
                        </div>

                        <div class="col-12 col-md-4"> 
                          <div class="form-group">
                              <label for="status">Status</label>
                              <select id="status" name="status" class="form-control custom-select">
                                <option selected disabled>Change Status</option>
                                  <option value="active">Active</option>
                                  <option value="in-active">In-Active</option>
                              </select>
                          </div>
                        </div>

                        <div class="col-12 col-md-4"> 
                          <div class="form-group">
                              <label for="role">Role</label>
                              <select id="role" name="role" class="form-control custom-select">
                                <option selected disabled>Select Role</option>
                                  <option value="user">User</option>
                                  <option value="admin">Admin</option>
                              </select>
                          </div>
                        </div>
                        
                      </div>
                     
                      
                     
                      	                 
                      <input id="registerUser" type="button" name="registerUser" class="btn btn-primary" value="Register">
                     
                    </div>
                  </div>
                </div>
              </div>
            
              
            </div>
            <!-- /.card -->
          </div>
        </div>
       
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "{$_SERVER['DOCUMENT_ROOT']}/csdcapp/partials/_footer.php";?>
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="../csdcapp/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../csdcapp/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../csdcapp/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../csdcapp/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../csdcapp/plugins/moment/moment.min.js"></script>
<script src="../csdcapp/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../csdcapp/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../csdcapp/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../csdcapp/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../csdcapp/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../csdcapp/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../csdcapp/plugins/dropzone/min/dropzone.min.js"></script>
<!-- SweetAlert2 -->
<script src="../csdcapp/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../csdcapp/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="../csdcapp/dist/js/adminlte.min.js"></script>

<script>
// BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })
</script>

<script>

  $(document).ready(function(){

    $(document).on("click", "#autofill", function () {

        var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
        });

        var cs_no = $("#cs_no").val();

          if(cs_no === ""){
            toastr.error("Enter user's CS Number to Auto Fill")
          }
            
     
          $.ajax({
          url: "http://localhost/csdcapp/functions/autoFillUser.php",
          type: "post",
          data: {
            autofill: 1,
            csn: cs_no,
          },
          dataType: 'json',
          success: function (response) {
         
              $("#username").val(response.username);
              $("#fullname").val(response.fullname);
              $("#phone").val(response.phone);
              $("#email").val(response.email);
              $("#sex").val(response.sex);
              $("#cs_no").val("");
            
            if(response.error){
              toastr.error(response.error)
            }     
          },
        });
      
  
    });

    $(document).on("click", "#registerUser", function () {

      var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
      });

      var username = $("#username").val();
      var fullname =    $("#fullname").val();
      var phone =   $("#phone").val();
      var email =  $("#email").val();
      var sex =  $("#sex").val();
      var status = $("#status").val();
      var role = $("#role").val();


      if(username === ""){
        toastr.error("Username field cannot be empty")
      }

      if(status === ""){
        status = "active"
      }

      if(role === ""){
        role = "user"
      }


      $.ajax({
        url: "http://localhost/csdcapp/functions/registerUser.php",
        type: "post",
        data: {
          registerUser: 1,
          username : username,
          fullname :    fullname,
          phone :   phone,
          email :  email,
          sex :  sex,
          status : status,
          role : role
        },

        dataType: 'json',
        success: function (response) {
      
          if(response.error){
            $("#username").val("");
            $("#fullname").val("");
            $("#phone").val("");
            $("#email").val("");
            $("#sex").val("");
            toastr.error(response.error)
          }else if(response.success){
            $("#username").val("");
            $("#fullname").val("");
            $("#phone").val("");
            $("#email").val("");
            $("#sex").val("");
            toastr.success(response.success)
          }     
      },
    });


});
  });

</script>


</body>
</html>
