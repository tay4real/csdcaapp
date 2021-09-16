<!DOCTYPE html>
<html lang="en">
<!-- head -->
<?php   session_start(); ?>
<?php include "{$_SERVER['DOCUMENT_ROOT']}/csdcapp/partials/_head.php";?>

<body class="hold-transition sidebar-mini">

<div class="wrapper">
  <!-- Navbar -->
  <?php include "{$_SERVER['DOCUMENT_ROOT']}/csdcapp/partials/_top_navbar.php";?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include "{$_SERVER['DOCUMENT_ROOT']}/csdcapp/partials/_sidebar.php";?> 
  <?php include "{$_SERVER['DOCUMENT_ROOT']}/csdcapp/functions/utility.php";?> 

  <?php
  if(@validate($_REQUEST['link'])){
    $cs = $_REQUEST['link'];	
  }

  ?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Staff Record</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/csdcapp">Home</a></li>
              <li class="breadcrumb-item active">Update Staff Record</li>
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
                <h3 class="card-title">Update Staff Record</h3>
              </div>
              <div class="card-body p-3">
                <form method="post">
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
                                  <input type="text" class="form-control" id="cs_no" name="cs_no"   placeholder="CS Number" readonly >
                                </div>
                            </div>
  </div>
                        <div class="row">
                          <div class="col-12 col-md-4"> 
                              <div class="form-group">
                                  <label for="surname">Surname</label>
                                  <input type="text" class="form-control" id="surname" name="surname"  placeholder="Surname" readonly >
                              </div>
                          </div>
                          <div class="col-12 col-md-4">
                            <div class="form-group">
                              <label for="firstname">First Name</label>
                              <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" readonly >
                            </div>
                          </div>
                          <div class="col-12 col-md-4">
                            <div class="form-group">
                              <label for="othername">Other Name</label>
                              <input type="text" class="form-control" id="othername" name="othername"  placeholder="Other Name" value="" readonly>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-12 col-md-6"> 
                            <div class="form-group">
                                <label for="sex">Sex</label>
                                <select id="sex" name="sex" class="form-control custom-select">
                                  <option selected disabled>Select your gender</option>
                                  <option  value="MALE">MALE</option>
                                  <option  value="FEMALE">FEMALE</option>
                                </select>
                            </div>
                          </div>
                          <div class="col-12 col-md-6">
                            <div class="form-group">
                              <label for="dob">Date of Birth</label>
                              <input type="date" class="form-control" id="dob" name="dob"   placeholder="Date of Birth" >
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
                          
                        
                        <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                         
                      
                      </div>

                    


                      <div id="empinfo" class="content" role="tabpanel" aria-labelledby="empinfo-trigger">
                      <h4>Employment Information</h4>
                   
                        <div class="row">
                          <div class="col-12 col-md-6"> 
                            <div class="form-group">
                                <label for="parent_mda_code">Parent MDA</label>
                                <select id="parent_mda_code" name="parent_mda_code" class="form-control custom-select">
                                  <option selected disabled>Parent MDA</option>
                                
                                </select>
                            </div>
                          </div>
                          
                          <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="present_mda_code">Present MDA</label>
                                <select id="present_mda_code" name="present_mda_code" class="form-control custom-select">
                                  <option selected disabled>Present MDA</option>
                              
                                </select>
                            </div>
                          </div>
                          
                        </div>

                        <div class="row">
                       
                          <div class="col-12 col-md-6">
                              <div class="form-group">
                                <label for="salary_pay_point">Salary Pay Point</label>
                                <select id="salary_pay_point" name="salary_pay_point" class="form-control custom-select">
                                  <option selected disabled>Salary Pay Point</option>
                                  
                                </select>
                              </div>
                          </div>

                          <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="present_mda_lga">Present MDA LGA</label>
                                <select id="present_mda_lga" name="present_mda_lga" class="form-control custom-select">
                                  <option selected disabled>Present MDA</option>
                                  
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
                                 
                                </select>
                            </div>
                          </div>
                          <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="level">Level</label>
                                <select id="level" name="level" class="form-control custom-select">
                                  <option selected disabled>Select Level</option>
                                 
                                </select>
                            </div>
                          </div>
                          <div class="col-12 col-md-4"> 
                                <div class="form-group">
                                  <label for="designation">Present Post</label>
                                  <input type="text" class="form-control" id="designation" name="designation" placeholder="Present Post" value="" readonly>
                                </div>
                          </div>
                        </div>
                      
                      
                        
                        <div class="row mb-3">
                            
                            
                            <div class="col-12 col-md-4">
                              <div class="form-group">
                                  <label for="dfa">Date of First Appointment</label>
                                  <input type="date" class="form-control" id="dfa" name="dfa" placeholder="Date of First Appointment" value="">
                              </div>
                            </div>
                            <div class="col-12 col-md-4">
                              <div class="form-group">
                                  <label for="dpa">Date of Present Appointment</label>
                                  <input type="date" class="form-control" id="dpa" name="dpa" placeholder="Date of Present Appointment" value="">
                              </div>
                            </div>

                            <div class="col-12 col-md-4"> 
                                <div class="form-group">
                                  <label for="designation">Date of Retirement</label>
                                  <input type="date" class="form-control" id="retirement_date" name="retirement_date" placeholder="Date of Present Appointment" value="" readonly>
                                </div>
                          </div>
                           
                        </div>
                        <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                        <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                      </div>
                      <div id="bankinfo" class="content" role="tabpanel" aria-labelledby="bankinfo-trigger">
                        <h4>Salary Bank Information</h4>
                        <div class="row">
                        <div class="col-12 col-sm-6"> 
                              <div class="form-group">
                                <label for="bank_name">Bank Name</label>
                                <select id="bank_name" name="bank_name" class="form-control custom-select">
                                  <option selected disabled>Select Bank</option>
                                 
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
                        <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                        <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                      </div>


                      <div id="qualifications" class="content" role="tabpanel" aria-labelledby="qualifications-trigger">
                      <h4>Qualifications</h4>
                      <div class="row">
                        <div class="col-12 col-md-5">
                          <div class="form-group">
                                <label for="qualification_category">Qualification Category</label>
                                <select id="qualification_category" name="qualification_category" class="form-control custom-select">
                                  <option selected disabled>Choose Category</option>
                                  <option value="pry_certificate">Primary School Leaving Certificate</option>
                                  <option value="jss3_certificate">Junior Secondary School Certificate</option>
                                  <option value="sss_certificates">Senior Secondary School Certificate</option>
                                  <option value="tertiary_certificates">Undergraduate Certificate</option>
                                  <option value="pg_certificates">Post Graduate Certificate</option>
                                  <option value="prof_qual_international">Professional Certification</option>
                                  <option value="prof_mem_international">Professional Membership</option>
                                  <option value="prof_qual_others">Artisan Certification</option>
                                  <option value="prof_mem_others">Artisan Membership</option>
                                </select>
                              </div>
                        </div>
                        <div class="col-12 col-md-5">
                        <div class="form-group">
                                  <label for="qualification_info">Qualification Obtained - Year Obtained</label>
                                  <input type="text" class="form-control" id="qualification_info" name="qualification_info" placeholder="Qualification Obtained - Year Obtained" >
                                  <span class="text-muted" id="qual_info_desc"></span>
                                </div>
                        </div>
                        <div class="col col-md-2  d-flex align-items-end mb-3">    
                            <button type="button" onClick="" class="btn btn-primary">Add New</button>
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
                                <table id="qualification_list" class="table table-sm">
                                  <thead>
                                    <tr>
                                      <th style="width: 10px">#</th>
                                      <th>Category</th>
                                      <th>Qualification Obtained</th>
                                      <th style="width: 40px">Edit</th>
                                      <th style="width: 40px">Remove</th>
                                    </tr>
                                  </thead>
                                  <tbody id="qualification_list_body">
                                   
                                  
                                  </tbody>
                                </table>
                              </div>
                              <!-- /.card-body -->
                            </div>
                          </div>
                      </div>
                        <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                        <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
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
                        <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
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
<!-- dropzonejs -->
<script src="../csdcapp/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../csdcapp/dist/js/adminlte.min.js"></script>

<!-- load components -->
<script src="../csdcapp/dist/js/components/mda_list.js"></script>
<script src="../csdcapp/dist/js/components/lga_list.js"></script>
<script src="../csdcapp/dist/js/components/cadres.js"></script>
<script src="../csdcapp/dist/js/components/gradeLevels.js"></script>
<script src="../csdcapp/dist/js/components/banks.js"></script>


<script type="text/javascript">
$(document).ready(function(){

  var cs_no = '<?php echo  $cs  ?>'
  
    $.ajax({
      url: "http://localhost/csdcapp/functions/get_staff_data.php",
        type: 'post',
        data: {csn : cs_no},
        dataType: 'json',
        success:function(res){
         
          console.log(res)
          let inputCsNo = document.getElementById("cs_no");
          let inputSurname = document.getElementById("surname");
          let inputFirstname = document.getElementById("firstname");
          let inputOthername = document.getElementById("othername");
          let inputSex = document.getElementById("sex");
          let inputDateOfBirth = document.getElementById("dob");
          let inputEmail = document.getElementById("email");
          let inputPhone = document.getElementById("phone");
          let inputNokFullname = document.getElementById("nok_fullname");
          let inputNokPhone = document.getElementById("nok_phone");
          let inputNokAddress = document.getElementById("nok_address");
          let inputPresentMdaLga = document.getElementById("present_mda_lga");
          let inputParentMdaCode = document.getElementById("parent_mda_code");
          let inputPresentMdaCode = document.getElementById("present_mda_code");
          let inputCadre = document.getElementById("cadre");
          let inputLevel = document.getElementById("level");
          let inputPresentPost = document.getElementById("designation");
          let inputDateOfFirstAppointment = document.getElementById("dfa");
          let inputDateOfPresentAppointment = document.getElementById("dpa");
          let RetirementDate = document.getElementById("retirement_date");
          let inputSalaryPayPoint = document.getElementById("salary_pay_point");
          let inputBankName = document.getElementById("bank_name");
          let inputAccountName = document.getElementById("account_name");
          let inputAccountNo = document.getElementById("account_no");
          let inputImagePath = document.getElementById("results");
          let inputQualificationCategory = document.getElementById("qualification_category");
          let qualificationInfoDesc = document.getElementById("qual_info_desc");
          
          



          
          

        function isValidTimestamp(_timestamp) {
            const newTimestamp = new Date(_timestamp).getTime();
            return isNumeric(newTimestamp);
        }

        function isNumeric(n) {
            return !isNaN(parseFloat(n)) && isFinite(n);
        }
        
           // process data from db
           var dob = "";
            let dobStr = res.dob_y+"-"+ res.dob_m + "-" + res.dob_d;
            if(isValidTimestamp(dobStr)){
              dob = new Date(dobStr).toISOString()
        .substring(0, 10);
            }

            var dateFirstAppointment
            let strDateFirstAppointment = res.yfa + "-" + res.mfa + "-" + res.dfa;
            if(isValidTimestamp(strDateFirstAppointment)){
             dateFirstAppointment = new Date(strDateFirstAppointment).toISOString()
        .substring(0, 10);
            }
            
            var datePresentAppointment = "";
            let strDatePresentAppointment = res.ypa + "-" + res.mpa + "-" + res.dpa;
            if(isValidTimestamp(strDatePresentAppointment)){
              datePresentAppointment = new Date(strDatePresentAppointment).toISOString()
        .substring(0, 10);
            }
           

        var dateOfRetirement = "";
        if(res.retirement_year !== 0 && res.retirement_month !== 0 && res.retirement_date !== 0){
          let strRetirementDate = res.retirement_year + "-" + res.retirement_month + "-" + res.retirement_day;

          if(isValidTimestamp(strRetirementDate)){
            dateOfRetirement = new Date(strRetirementDate).toISOString()
        .substring(0, 10);
          }else{
            dateOfRetirement = "";
          }
            
        }
        
    
            // updating form record with data
            inputCsNo.value = res.cs_no;
            inputSurname.value = res.surname;
            inputFirstname.value = res.firstname;
            inputOthername.value = res.othername;
            inputSex.value = res.sex;
            inputDateOfBirth.value = dob;
            inputEmail.value = res.email;
            inputPhone.value = res.phone;
            inputNokFullname.value = res.nok_fullname;
            inputNokPhone.value = res.nok_phone;
            inputNokAddress.value = res.nok_address;
            inputPresentMdaLga.value = res.present_mda_lga;
            inputParentMdaCode.value = res.parent_mda_code;
            inputPresentMdaCode.value = res.present_mda_code;
            inputCadre.value = res.cadre;
            inputLevel.value = res.level;
            inputPresentPost.value = res.designation;
            inputDateOfFirstAppointment.value = dateFirstAppointment;
            inputDateOfPresentAppointment.value = datePresentAppointment;
            RetirementDate.value = dateOfRetirement;
            inputSalaryPayPoint.value = res.salary_pay_point;
            inputBankName.value = res.bank_name;
            inputAccountName.value = res.account_name;
            inputAccountNo.value = res.account_no;

            inputImagePath.innerHTML = 
              '<img src="' + res.photopath + '" class="img-fluid" />';


            // Educational Qualifications
            // Show Description 
            $("#qualification_category").change(function(){
              var category = $(this).val();
              console.log(category);
              if(category === "pry_certificate" ){
                
                qualificationInfoDesc.innerHTML = "<i><small>e.g PSLC - 1992</small></i>"
              }else if(category === "jss3_certificate" ){
                qualificationInfoDesc.innerHTML = "<i><small>e.g JSSC - 1995</small></i>"
              }if(category === "sss_certificates" ){
                qualificationInfoDesc.innerHTML = "<i><small>e.g SSLC - 1992</small></i>"
              }if(category === "tertiary_certificates" ){
                qualificationInfoDesc.innerHTML = "<i><small>e.g BSc. Computer Engineering - 2003</small></i>"
              }if(category === "pg_certificates" ){
                qualificationInfoDesc.innerHTML = "<i><small>Use comma or colon seperator e.g MTech. Computer Science - 2012; PhD. Cyber Sercurity - 2020</small></i>"
              }if(category === "prof_qual_international" ){
                qualificationInfoDesc.innerHTML = "<i><small>Certification issuing_authority - year e.g Registered Engineer Coren - 2019</small></i>"
              }if(category === "prof_mem_international" ){
                qualificationInfoDesc.innerHTML = "<i><small>Membership body - Membership numbere.g NCS - 625762</small></i>"
              }
              if(category === "prof_qual_others" ){
                qualificationInfoDesc.innerHTML = "<i><small>Certificate Obtained - Year Obtained e.g Certificate of Completion Fashion Design - 2019</small></i>"
              }
              if(category === "prof_mem_others" ){
                qualificationInfoDesc.innerHTML = "<i><small>Membership body - Membership Number</small></i>"
              }
            })

            
           



            let pry = res.pry_certificate;
            let jss3 = res.jss3_certificate;
            let sss = res.sss_certificates;
            let tertiary = res.tertiary_certificates;
            let pg = res.pg_certificates;
            let doctoral = res.doctoral_certificates;
            let prof_qual_int = res.prof_qual_international;
            let prof_qual_nat = res.prof_qual_national;
            let prof_mem_int = res.prof_mem_international;
            let prof_mem_nat = res.prof_mem_national;
            let artisan_certificate = res.prof_qual_others;
            let artisan_membership = res.prof_mem_others;

            const qualifications = [];

            // add Primary School Certificates
            if(pry !== 'NA' || pry !== ''){

              qualifications.push({
                  category: "Primary School Certificate",
                  qualification_obtained: pry
                })

              // // search if string contains multiple qualifications
              // if(pry.includes(',')){
              //   let pry_qualifications = pry.split(",")

              //   pry_qualifications.map(qual => {
              //     qualifications.push({
              //       category: "Primary School Certificate",
              //       qualification_obtained: qual
              //     })
              //   })

              // }else{
              //   qualifications.push({
              //     category: "Primary School Certificate",
              //     qualification_obtained: pry
              //   })
              // }
            }

            // add Junior Secondary Certificate
            if(jss3 !== 'NA' || jss3 !== ''){

              qualifications.push({
                  category: "Junior Secondary Certificate",
                  qualification_obtained: jss3
                })

              
            }
            
            
            // add Senior Secondary Certificate
            if(sss !== 'NA' || sss !== ''){
              qualifications.push({
                  category: "Secondary Secondary Certificate",
                  qualification_obtained: sss
                })
              
            }

            // add Undergraduate Certificate
            if(tertiary.toString() !== 'NA' || tertiary.toString() !== ''){
              
                qualifications.push({
                  category: "Undergraduate Certificate",
                  qualification_obtained: tertiary
                })
             
            }


            // add post graduate Certificate
            if(pg.toString() !== 'NA' || pg.toString() !== '' ){

              qualifications.push({
                  category: "Graduate Certificate",
                  qualification_obtained: pg
                })
             
            }

            // add post graduate Certificate
            if(doctoral !== 'NA' || doctoral !== '' ){

                qualifications.push({
                  category: "Graduate Certificate",
                  qualification_obtained: doctoral
                })
              
            }

            // add Professional Certification
            if(prof_qual_int !== 'NA' || prof_qual_int !== '' ){
                qualifications.push({
                  category: "Professional Certification",
                  qualification_obtained: prof_qual_int
                })
            }

            // add Professional Certification
            if(prof_qual_nat !== 'NA' || prof_qual_nat !== '' ){
                qualifications.push({
                  category: "Professional Certification",
                  qualification_obtained: prof_qual_nat
                })
            }


             // add Professional Membership
             if(prof_mem_int !== 'NA' || prof_mem_int !== '' ){
                qualifications.push({
                  category: "Professional Certification",
                  qualification_obtained: prof_mem_int
                })
            }


            // add Professional Membership
            if(prof_mem_nat !== 'NA' || prof_mem_nat !== '' ){
                qualifications.push({
                  category: "Professional Certification",
                  qualification_obtained: prof_mem_nat
                })
            }

            // add Artisan Certificate
            if(artisan_certificate !== 'NA' || artisan_certificate !== '' ){
                qualifications.push({
                  category: "Artisan Certification",
                  qualification_obtained: artisan_certificate
                })
            }

            // add Artisan Membership
            if(artisan_membership !== 'NA' || artisan_membership !== '' ){
                qualifications.push({
                  category: "Artisan Certification",
                  qualification_obtained: artisan_membership
                })
            }


            qualifications.map((qual, key) => {
              if(qual.qualification_obtained !== 'NA'){
                $("table tbody").append(`<tr><td>#</td><td>${qual.category}</td><td>${qual.qualification_obtained}</td><td><span class='badge bg-info'>Edit</span></td><td><span class='badge bg-danger'>Delete</span></td></tr>`)
              }    
            })

            console.log(qualifications);
            
      },
      error: function (res) {},
    });
});
</script>

<!-- Webcam -->
<script src="../csdcapp/plugins/webcam/webcam.min.js"></script>

<script src="../csdcapp/dist/js/components/webcam.js"></script>

<script>
// BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })
</script>
</body>
</html>
