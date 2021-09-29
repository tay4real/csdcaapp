<!DOCTYPE html>
<html lang="en">
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
<!-- head -->
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
            <h1>MDA List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/csdcapp">Home</a></li>
              <li class="breadcrumb-item active">MDA List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row mb-3 justify-content-end pr-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
          Add New MDA
        </button>
      </div>
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
          
                <table id="mdas" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>MDA Code</th>
                    <th>MDA Name</th>  
                    <th>Action</th> 
                                
                  </tr>
                  </thead>
                  <tbody >

                  </tbody> 
                  <tfoot>
                    <th>MDA Code</th>
                    <th>MDA Name</th>  
                    <th>Action</th>          
                  </tfoot>
                </table>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">New MDA</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col-12 col-sm-12"> 
                    <div class="form-group">
                      <input type="text" class="form-control" id="new_mda" name="mda" placeholder="Enter MDA Name" >
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id="addMDA" type="submit" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

     
  <!-- /.content-wrapper -->
  <?php include "{$_SERVER['DOCUMENT_ROOT']}/csdcapp/partials/_footer.php";?>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../csdcapp/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="../csdcapp/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../csdcapp/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../csdcapp/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../csdcapp/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../csdcapp/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../csdcapp/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../csdcapp/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../csdcapp/plugins/jszip/jszip.min.js"></script>
<script src="../csdcapp/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../csdcapp/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../csdcapp/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../csdcapp/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../csdcapp/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- SweetAlert2 -->
<script src="../csdcapp/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../csdcapp/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="../csdcapp/dist/js/adminlte.min.js"></script>
<!-- staff list -->
<script src="http://localhost/apiservice/pages/mda_list.js"></script>
<script>

   function confirmDelete(){
     var del = confirm("Do you want to Delete?")

     if(del == true){
      
      $(document).ready(function(){
        var code = '<?php if(isset($mdacode)){echo  $mdacode;}else {echo "";} ?>'

          if(code !== ""){
            $.ajax({
              url: "http://localhost/csdcapp/functions/del_mda.php",
              type: "post",
              data: {
                delMDA: 1,
                code: code,
              },
              dataType: 'json',
              success: function (response) {         
                if(response.error){
                  toastr.error(response.error)
                }else if(response.success){
                  toastr.success(response.success)
                }   
              },
            });
          }
      });
    }
  }
  
  $(document).ready(function(){

    $(document).on("click", "#addMDA", function () {
        var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
        });

        var mda = $("#new_mda").val();

          if(mda === ""){
            toastr.error("You cannot submit an empty form")
          }else{
            $.ajax({
          url: "http://localhost/csdcapp/functions/add_mda.php",
          type: "post",
          data: {
            addMDA: 1,
            mda: mda,
          },
          dataType: 'json',
          success: function (response) {
         
            $("#new_mda").val("");
            
            if(response.error){
              toastr.error(response.error)
            }else if(response.success){
              toastr.success(response.success)
            }   
          },
        });
          }
               
    });

      
  });

</script>

</body>
</html>
