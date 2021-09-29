<?php

require_once('../db_connect.php'); 
require_once ('utility.php');

function calculateStaffRetirement( $dateOfBirth, $dateOfFirstAppointment){

    $lengthOfService = 35;
    $retirementAge = 65;

    $birthdate = explode('-', $dateOfBirth);
    $retirement_year_by_age = (int)$birthdate[0] + $retirementAge;
    $retirement_month_by_age   = $birthdate[1];
    $retirement_day_by_age  = $birthdate[2];

    $dfa = explode('-', $dateOfFirstAppointment);
    $retirement_year_by_service = (int)$dfa[0] + $lengthOfService;
    $retirement_month_by_service   = $dfa[1];
    $retirement_day_by_service  = $dfa[2];



    if($retirement_year_by_age < $retirement_year_by_service ){	
        $retirementDetails = (object) [ "retirement_day" => $retirement_day_by_age,  "retirement_month" => $retirement_month_by_age,  "retirement_year" => $retirement_year_by_age, "retirement_criteria" => "Age"];

        return $retirementDetails;
      
    }else{
        $retirementDetails = (object) [ "retirement_day" => $retirement_day_by_service,  "retirement_month" => $retirement_month_by_service,  "retirement_year" => $retirement_year_by_service, "retirement_criteria" => "Length of service"];

        return $retirementDetails;
    }  
}

function updateRetirementStatus(){
     // Retirement by Age in years
     $retirementAge = (int)$retirementAge * 365;
     $retirementByLengthOfServiceInDays = (int)$lengthOfService * 365;
 
     
     $dob = strtotime($dateOfBirth);
     $dfa = strtotime($dateOfFirstAppointment);
     $currentDate = strtotime(date("Y-m-d"));
 
     //Difference in dates 
     $currentAge = ($currentDate - $dob)/60/60/24;
     $currentServiceYears = ($currentDate - $dfa)/60/60/24;
 
     
     $remainingDaysOfServiceByAge = $retirementAgeInDays - $currentAge;
     $remainingDaysOfServiceByLength = $retirementByLengthOfServiceInDays - $currentServiceYears;
     
     // Updating Retirement Status
     // if age is equal to 65 years and number of years spent in service is less than 35, then retire 
     if ($currentAge == $retirementAgeInDays && $currentServiceYears < $retirementByLengthOfServiceInDays){
          // update Retirement Info
         $updateRetirementStatus = customUpdateStaff("in_service", "no", $cs_no);
     }
     // if number of years spent in service is equal to 35 years and age is less than 65 years, then retire
     else if($differenceByDOB <= $retirementAgeInDays && $differenceByDFA == $retirementByLengthOfServiceInDays){
         $updateRetirementStatus = customUpdateStaff("in_service", "no", $cs_no);
     }
}


function getDesignation($cadre, $level)
{
    $con=con();
    $table=$con->query("select * from soscadres WHERE Cadre = '$cadre' AND GL = '$level'");
    return $table->fetch_array();	
}



function updateEmpInfo($cs_no, $present_mda_lga,$parent_mda_code,$present_mda_code,$salary_pay_point,$cadre,$level,$designation,$dfa,$mfa,$yfa,$dpa,$mpa,$ypa,$retirement_day,$retirement_month,$retirement_year, $retirement_criteria)
{
	$con=con();
	//checking if staff record is available in db
			
	return $con->query("UPDATE staff_updated SET present_mda_lga='$present_mda_lga', present_mda_code='$present_mda_code', parent_mda_code = '$parent_mda_code',salary_pay_point = '$salary_pay_point', cadre = '$cadre', level = '$level', designation = '$designation', dfa = '$dfa', mfa ='$mfa' ,yfa = '$yfa', dpa = '$dpa', mpa = '$mpa', ypa = '$ypa', retirement_day = '$retirement_day',retirement_month = '$retirement_month',retirement_year = '$retirement_year', retirement_criteria = '$retirement_criteria' WHERE cs_no = '$cs_no'");
	//echo $con->error;
			
}

if (isset($_POST['upd_empinfo'])) {
  
    $cs_no = $_POST['csn'];
    $dob = $_POST['dob'];
    $present_mda_lga = $_POST['present_mda_lga'];
    $parent_mda_code = $_POST['parent_mda_code'];
    $present_mda_code = $_POST['present_mda_code'];
    $salary_pay_point = $_POST['salary_pay_point'];
    $cadre = $_POST['cadre'];
    $level = $_POST['level'];
    $designation = $_POST['designation'];
    $dfa = $_POST['dfa'];
    $dpa = $_POST['dpa'];
    $retirement_date = $_POST['retirement_date'];
   
    // update user designation
    $designation_array = getDesignation($cadre, $level);

    if(@validate($designation_array["Post"])){
        $designation = $designation_array["Post"];
    }


    // Split date into  Day, Month and Year
    $dateOfFirstAppointment = explode('-', $dfa);
    $dfa_year = $dateOfFirstAppointment[0];
    $dfa_month   = $dateOfFirstAppointment[1];
    $dfa_day  = $dateOfFirstAppointment[2];

    $errors = array();
    if(!checkdate($dfa_month, $dfa_day, $dfa_year)){ 
        $errors[] = array("dfa_error" => "Date is Invalid" );
    }

    $dateOfPresentAppointment = explode('-', $dpa);
    $dpa_year = $dateOfPresentAppointment[0];
    $dpa_month   = $dateOfPresentAppointment[1];
    $dpa_day  = $dateOfPresentAppointment[2];

    if(!checkdate($dpa_month, $dpa_day, $dpa_year)){
        $errors[] = array("dpa_error" => "Date is Invalid" );
    }

     // Calculate Retirement Age
     $retirement_detail = calculateStaffRetirement( $dob, $dfa);

     if($retirement_detail){
        $r_year = $retirement_detail->retirement_year;
        $r_month = $retirement_detail->retirement_month;
        $r_day = $retirement_detail->retirement_day;
        $r_criteria = $retirement_detail->retirement_criteria;
     }

     // Get
   
    

     // Update Employment Info
     $successuful = updateEmpInfo($cs_no, $present_mda_lga,$parent_mda_code,$present_mda_code,$salary_pay_point,$cadre,$level,$designation,$dfa_day,$dfa_month, $dfa_year,$dpa_day,$dpa_month,$dpa_year,$r_day,$r_month,$r_year, $r_criteria);

    if($successuful){
        $updated_object = (object) ["designation" => $designation, "retirement_day" => $r_day,  "retirement_month" => $r_month,  "retirement_year" => $r_year, "retirement_criteria" => $r_criteria
    ];
        // encoding array to json format
        echo json_encode($updated_object);
    }

}


?>