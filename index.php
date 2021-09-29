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
}else{
  header("location: /csdcapp/login.php");
}
?>

<?php include "{$_SERVER['DOCUMENT_ROOT']}/csdcapp/partials/_head.php";?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/csdc.png" alt="AdminLTELogo"  width="200">
  </div>

  <!-- top navbar -->

<?php 
include "{$_SERVER['DOCUMENT_ROOT']}/csdcapp/partials/_top_navbar.php";
?>

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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/csdcapp">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <!-- /.row -->
        <!-- Main row -->
     
        <div class="row">
     
          <section class="col-lg-12 ">
         
          <div class="card ">
              <div class="card-header border-0 bg-light">
                <h3 class="card-title ">
                  In-Service and Retired Staff Monthly Review
                </h3>
              </div>
              <div class="card-body">
                <canvas class="chart" id="bar-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
           
            </div>
          
          </section>

        </div>
    
      </div>
    </section>

  </div>


  <!-- /.content-wrapper -->
<!-- footer -->
<?php include "{$_SERVER['DOCUMENT_ROOT']}/csdcapp/partials/_footer.php";?>


</div>
<!-- ./wrapper -->

<?php include "{$_SERVER['DOCUMENT_ROOT']}/csdcapp/partials/_included_scripts.php";?>
</body>
</html>
