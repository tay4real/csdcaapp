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
            <h1>New Staff</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/csdcapp">Home</a></li>
              <li class="breadcrumb-item"><a href="/csdcapp/staff_list.php">Staff List</a></li>
              <li class="breadcrumb-item active">New Staff</li>
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
              <div class="card-header">
                <h3 class="card-title">Register New Staff</h3>
              </div>
              <div class="card-body p-3">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#biodata">
                      <button type="button" class="step-trigger" role="tab" aria-controls="biodata" id="biodata-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label d-none d-md-block">Bio Data & NOK Info</span>
                      </button>
                    </div>
                    
                  
                    
                    <div class="step" data-target="#empinfo">
                      <button type="button" class="step-trigger" role="tab" aria-controls="empinfo" id="empinfo-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label d-none d-md-block">Emp Info</span>
                      </button>
                    </div>
                    <div class="step" data-target="#bankinfo">
                      <button type="button" class="step-trigger" role="tab" aria-controls="bankinfo" id="bankinfo-trigger">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label d-none d-md-block">Salary Bank Info</span>
                      </button>
                    </div>

                    <div class="step" data-target="#qualifications">
                      <button type="button" class="step-trigger" role="tab" aria-controls="qualifications" id="qualifications-trigger">
                        <span class="bs-stepper-circle">4</span>
                        <span class="bs-stepper-label d-none d-md-block">Qualifications</span>
                      </button>
                    </div>

                    <div class="step" data-target="#capture">
                      <button type="button" class="step-trigger" role="tab" aria-controls="capture" id="capture-trigger">
                        <span class="bs-stepper-circle">5</span>
                        <span class="bs-stepper-label d-none d-md-block">Face Capture</span>
                      </button>
                    </div>
                  </div>
                  <div class="line"></div>
                  <br />
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div id="biodata" class="content" role="tabpanel" aria-labelledby="biodata-trigger">
                      <h4>Bio Data & NOK Information</h4>
                      <div class="row">
                          <div class="col-12 col-sm-4"> 
                              <div class="form-group">
                                <label for="cs_no">CS Number</label>
                                <input type="text" class="form-control" id="cs_no" name="cs_no" placeholder="CS Number" >
                              </div>
                           </div>
                      </div>
                      <div class="row">
                        <div class="col-12 col-md-4"> 
                            <div class="form-group">
                                <label for="surname">Surname</label>
                                <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" >
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                          <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" >
                          </div>
                        </div>
                        <div class="col-12 col-md-4">
                           <div class="form-group">
                             <label for="othername">Other Name</label>
                             <input type="text" class="form-control" id="othername" name="othername" placeholder="Other Name" value="">
                           </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-12 col-md-6"> 
                          <div class="form-group">
                              <label for="sex">Sex</label>
                              <select id="sex" name="sex" class="form-control custom-select">
                                <option selected disabled>Select your gender</option>
                                 <option>MALE</option>
                                <option>FEMALE</option>
                              </select>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="form-group">
                             <label for="dob">Date of Birth</label>
                             <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" value="">
                          </div>
                        </div>
                      </div>
                     
                      <div class="row mb-3">
                          <div class="col-12 col-md-8"> 
                              <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="">
                              </div>
                           </div>
                          
                          <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="">
                            </div>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-12 col-md-6"> 
                            <div class="form-group">
                                <label for="nok_fullname">Next of Kin Fullname</label>
                                <input type="text" class="form-control" id="nok_fullname" name="nok_fullname" placeholder="Next of Kin Fullname" >
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="form-group">
                            <label for="nok_phone">Next of Kin Phone Number</label>
                            <input type="text" class="form-control" id="nok_phone" name="nok_phone" placeholder="Next of Kin Phone Number" >
                          </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group">
                             <label for="nok_address">NOK Address</label>
                             <input type="text" class="form-control" id="nok_address" name="nok_address" placeholder="NOK Address" value="">
                           </div>
                        </div>
                      </div>
                      	
                      
                      <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                      
                     
                    </div>

                   


                    <div id="empinfo" class="content" role="tabpanel" aria-labelledby="empinfo-trigger">
                    <h4>Employment Information</h4>
                     
                      <div class="row">
                        <div class="col-12 col-md-4"> 
                          <div class="form-group">
                              <label for="parent_mda_code">Parent MDA</label>
                              <select id="parent_mda_code" name="parent_mda_code" class="form-control custom-select">
                                <option selected disabled>Parent MDA</option>
                                 <?php


                                  ?>
                              </select>
                          </div>
                        </div>
                        <div class="col-12 col-md-4">
                          <div class="form-group">
                              <label for="present_mda_code">Present MDA</label>
                              <select id="present_mda_code" name="present_mda_code" class="form-control custom-select">
                                <option selected disabled>Present MDA</option>
                                 <?php


                                  ?>
                              </select>
                          </div>
                        </div>
                        <div class="col-12 col-md-4">
                          <div class="form-group">
                              <label for="present_mda_lga">Present MDA LGA</label>
                              <select id="present_mda_lga" name="present_mda_lga" class="form-control custom-select">
                                <option selected disabled>Present MDA</option>
                                 <?php


                                  ?>
                              </select>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-12 col-md-4"> 
                          <div class="form-group">
                              <label for="cadre">Cadre</label>
                              <select id="cadre" name="cadre" class="form-control custom-select">
                                <option selected disabled>Select Cadre</option>
                                <?php

                                ?>
                              </select>
                          </div>
                        </div>
                        <div class="col-12 col-md-4">
                          <div class="form-group">
                              <label for="level">Level</label>
                              <select id="level" name="level" class="form-control custom-select">
                                <option selected disabled>Select Level</option>
                                <?php

                                ?>
                              </select>
                          </div>
                        </div>
                        <div class="col-12 col-md-4">
                          <div class="form-group">
                              <label for="step">Step</label>
                              <select id="step" name="step" class="form-control custom-select">
                                <option selected disabled>Select Step</option>
                                <?php

                                ?>
                              </select>
                          </div>
                        </div>
                      </div>
                     
                    
                      
                      <div class="row mb-3">
                          <div class="col-12 col-md-3"> 
                              <div class="form-group">
                                <label for="present_post">Present Post</label>
                                <input type="text" class="form-control" id="present_post" name="present_post" placeholder="Present Post" value="">
                              </div>
                           </div>
                          
                          <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="dfa">Date of First Appointment</label>
                                <input type="date" class="form-control" id="dfa" name="dfa" placeholder="Date of First Appointment" value="">
                            </div>
                          </div>
                          <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="dpa">Date of Present Appointment</label>
                                <input type="date" class="form-control" id="dpa" name="dpa" placeholder="Date of Present Appointment" value="">
                            </div>
                          </div>
                          <div class="col-12 col-md-3">
                            <div class="form-group">
                              <label for="step">Salary Pay Point</label>
                              <select id="step" name="step" class="form-control custom-select">
                                <option selected disabled>Salary Pay Point</option>
                                <?php

                                ?>
                              </select>
                            </div>
                          </div>
                      </div>
                      <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>
                    <div id="bankinfo" class="content" role="tabpanel" aria-labelledby="bankinfo-trigger">
                      <h4>Salary Bank Information</h4>
                      <div class="row">
                      <div class="col-12 col-sm-6"> 
                            <div class="form-group">
                              <label for="bank_name">Bank Name</label>
                              <select id="bank_name" name="bank_name" class="form-control custom-select">
                                <option selected disabled>Select Bank</option>
                                <?php

                                ?>
                              </select>
                            </div>
                            
                           </div>
                          
                           <div class="col-12 col-sm-6"></div>
                           <div class="col-12 col-sm-6"> 
                              <div class="form-group">
                                <label for="account_name">Account Name</label>
                                <input type="text" class="form-control" id="account_name" name="account_name" placeholder="Account Name" >
                              </div>
                           </div>
                           <div class="col-12 col-sm-6"> 
                              <div class="form-group">
                                <label for="account_no">Account Number</label>
                                <input type="text" class="form-control" id="account_no" name="account_no" placeholder="Account Number" >
                              </div>
                           </div>
                      </div>
                      <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>


                    <div id="qualifications" class="content" role="tabpanel" aria-labelledby="qualifications-trigger">
                    <h4>Qualifications</h4>
                    <div class="row">
                      <div class="col-12 col-md-5">
                        <div class="form-group">
                              <label for="qualification_category">Qualification Category</label>
                              <select id="qualification_category" name="qualification_category" class="form-control custom-select">
                                <option selected disabled>Choose Category</option>
                                <option value="pry_certificate">Primary School Certificate</option>
                                <option value="jss3_certificate">Junior Secondary Certificate</option>
                                <option value="sss_certificates">Senior Secondary Certificate</option>
                                <option value="tertiary_certificates">Graduate Certificate</option>
                                <option value="pg_certificates">Post Graduate Certificate</option>
                                <option value="doctoral_certificates">Doctorate Certificate</option>
                                <option value="prof_qual_international">Professional Certification</option>
                                <option value="prof_mem_international">Professional Membership</option>
                                <option value="prof_qual_others">Artisan Certification</option>
                                <option value="prof_mem_others">Artisan Membership</option>
                              </select>
                            </div>
                      </div>
                      <div class="col-12 col-md-5">
                      <div class="form-group">
                                <label for="qualification_info">Oualification Obtained - Year Obtained</label>
                                <input type="text" class="form-control" id="qualification_info" name="qualification_info" placeholder="e.g PSLC - 1992" >
                              </div>
                      </div>
                      <div class="col col-md-2  d-flex align-items-end mb-3">    
                          <button onClick="" class="btn btn-primary">Add New</button>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col">
                          <div class="card">
                            <div class="card-header">
                              <h3 class="card-title">Qualifications</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body  table-responsive p-0">
                              <table class="table table-sm">
                                <thead>
                                  <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Category</th>
                                    <th>Qualification Obtained</th>
                                    <th style="width: 40px">Edit</th>
                                    <th style="width: 40px">Remove</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1.</td>
                                    <td>Post Graduate Certificate</td>
                                    <td>
                                      MTech. Computer Science - 2019
                                    </td>
                                    <td><span class="badge bg-info">Edit</span></td>
                                    <td><span class="badge bg-danger">Delete</span></td>
                                  </tr>
                                 
                                </tbody>
                              </table>
                            </div>
                            <!-- /.card-body -->
                          </div>
                        </div>
                    </div>
                      <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>

                    <div id="capture" class="content" role="tabpanel" aria-labelledby="capture-trigger">
                    <h4>Face Capture</h4>
                      <div class="card card-solid">
                        <div class="card-body pb-0">
                          <div class="row">
                            <div class="col-12  col-md-6 d-flex align-items-stretch flex-column">
                              <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                  Access Camera
                                </div>
                                <div class="card-body pt-0">
                                  <div class="row">
                                    <div id="my_camera" class="col d-flex justify-content-center align-items-center" style="min-height: 30vh">
	                                      <img src="../csdcapp/dist/img/Camera_rounded.svg.png" alt="" height="240">    
                                    </div>

                                  </div>
                                </div>
                                <div class="card-footer">
                                  <div class="text-right">
                                   
                                    <input type="button" class="btn btn-sm bg-teal" value="Access Camera" onClick="setup(); $(this).hide().next().show();">
                                   
                                    <span  class="btn btn-sm btn-primary" onClick="take_snapshot()">
                                      <i class="fas fa-user"></i> Take Snapshot
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12  col-md-6 d-flex align-items-stretch flex-column">
                              <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                  Captured Image
                                </div>
                                <div class="card-body pt-0">
                                  <div class="row">
                                    <div class="col d-flex justify-content-center align-items-center" style="min-height: 30vh">
                                      <div id="results">Your captured image will appear here...</div>
                                    </div>
                          
                                  </div>
                                </div>
                                <div class="card-footer">
                                  <div class="text-right py-3">
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                           
                          </div>
                        </div>
                      
                      </div>
                      <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
      
                      <input type="submit" name="addStaffSubmitButton" class="btn btn-primary" value="Submit">
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
<!-- AdminLTE App -->
<script src="../csdcapp/dist/js/adminlte.min.js"></script>

<script>
// BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })
</script>

<script src="http://localhost/apiservice/dist/js/components/webcam.js"></script>
</body>
</html>
