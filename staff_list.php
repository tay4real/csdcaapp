<!DOCTYPE html>
<html lang="en">
<!-- head -->
<?php include "{$_SERVER['DOCUMENT_ROOT']}/csdcapp/partials/_head.php";?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include "{$_SERVER['DOCUMENT_ROOT']}/csdcapp/partials/_top_navbar.php";?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include "{$_SERVER['DOCUMENT_ROOT']}/csdcapp/partials/_sidebar.php";?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Staff List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Staff List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
          
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>CS Number</th>
                    <th>Surname</th>
                    <th>Firstname</th>
                    <th>Othername</th>
                    <th>Gender</th>
                    <th>Phone Number</th>
                    <th>Thumbnail</th>   
                    <th>Action</th>               
                  </tr>
                  </thead>
                  <tbody >
                  
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
<!-- AdminLTE App -->
<script src="../csdcapp/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../csdcapp/dist/js/pages/staff_list.js"></script>

</body>
</html>
