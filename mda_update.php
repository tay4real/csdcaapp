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
  <?php include "{$_SERVER['DOCUMENT_ROOT']}/csdcapp/functions/utility.php";?> 

  <?php
  if(@validate($_REQUEST['link'])){
    $mdacode = $_REQUEST['link'];	
  }

  ?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update MDA</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/csdcapp">Home</a></li>
              <li class="breadcrumb-item"><a href="/csdcapp/mda_list.php">MDA List</a></li>
              <li class="breadcrumb-item active">Update MDA</li>
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
             
              <div class="card-body p-3">
                <form method="post">
                  <div class="bs-stepper">
                    <div class="bs-stepper-header" role="tablist">
                 
                      <div class="step" data-target="#biodata">
                        <button type="button" class="step-trigger" role="tab" aria-controls="biodata" id="biodata-trigger">
                         
                        </button>
                      </div>

                    </div>
                    <div class="line"></div>
                    <br />
                    <div class="bs-stepper-content">
                      <!-- your steps content here -->
                      <div id="biodata" class="content" role="tabpanel" aria-labelledby="biodata-trigger">
                      <div class="row">
                            <div class="col-12 "> 
                                <div  class="form-group d-flex justify-content-center align-items-center">
                                  
                                  <div id="loader"  class="spinner-border spinner-border-sm d-none" role="status">
                                  <span class="sr-only">Loading...</span>
                                  </div> 
                                  </div>
                                </div>    
                        </div>
                        <div class="row">
                               <div class="col-12 col-md-3"> 
                                <div class="form-group">
                                      <label for="email">MDA Code</label>
                                      <input type="text" class="form-control" id="code" name="code"   placeholder="MDA Name" readonly >
                                    </div>
                                </div>
                                
                                <div class="col-12 col-md-9">
                                  <div class="form-group">
                                      <label for="phone">MDA Name</label>
                                      <input type="text" class="form-control" id="name" name="name"   placeholder="MDA Name"  >
                                  </div>
                                </div>
                               
                        </div>
                       
                        <div class="form-group">
                      <button id="upd_mda" type="button" class="btn btn-primary"><div id="load" class="spinner-border spinner-border-sm d-none" role="status">
  <span class="sr-only">Loading...</span>
</div> Submit</button>
                      </div>
                         
                      
                      </div>              
                    </div>
                  </div>
                </form>
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
<!-- SweetAlert2 -->
<script src="../csdcapp/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../csdcapp/plugins/toastr/toastr.min.js"></script>
<!-- dropzonejs -->
<script src="../csdcapp/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../csdcapp/dist/js/adminlte.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){

    var code = '<?php echo  $mdacode  ?>'
    document.getElementById("loader").classList.remove("d-none");
    console.log(code)
    $.ajax({
      url: "http://localhost/csdcapp/functions/get_mda.php",
        type: 'post',
        data: {
              getMDA: 1,
              code: code
            },
        dataType: 'json',
        success:function(res){
         
        console.log(res)
        document.getElementById("loader").classList.add("d-none");
         document.getElementById("code").value = res.code
         document.getElementById("name").value = res.name   
      },
      error: function (res) {},
    });

    $(document).on("click", "#upd_mda", function () {
      var code = $("#code").val();
      var name = $("#name").val();
      document.getElementById("load").classList.remove("d-none");
      $.ajax({
        url: "http://localhost/csdcapp/functions/upd_mda.php",
        type: "post",
        data: {
          upd_mda: 1,
          code: code,
          name: name,
        },
        dataType: 'json',
        success: function (response) {
          document.getElementById("load").classList.add("d-none");

          if(response.error){
            toastr.error(response.error)
            $("#name").val(response.name);
            $("#code").val(response.code);
          }else if(response.success){
            toastr.success(response.success)
            $("#name").val(response.name);
            $("#code").val(response.code);
          }   
        },
      });
    });

  });

</script>

<!-- Webcam -->
<script src="../csdcapp/plugins/webcam/webcam.min.js"></script>

<script src="http://localhost/apiservice/components/webcam.js"></script>

<script>
// BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })
</script>
</body>
</html>
