<?php

require_once('../db_connect.php'); 
require_once ('utility.php');

function getEmpStatus($criteria, $value)
{
	$con=con();
	$table = $con->query("select in_service from staff_updated WHERE  $criteria like '%".$value."%'");
	return $table->fetch_array();
}


function customUpdateStaff($col, $val, $cs_no)
{
	$con=con();
	//checking if staff record is available in db
			
	return $con->query("UPDATE staff_updated SET $col  ='$val' WHERE cs_no = '$cs_no'");
	//echo $con->error;
			
}

if (isset($_POST['upd_biodata'])) {
    $cs_no = $_POST['csn'];
    $emp_status = $_POST['emp_status'];
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $othername = $_POST['othername'];
    $sex = $_POST['sex'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $nok_fullname = $_POST['nok_fullname'];
    $nok_phone = $_POST['nok_phone'];
    $nok_address = $_POST['nok_address'];

    // Split Date of Birth into Day, Month and Year
    $dateOfBirth = explode('-', $dob);
    $dob_year = $dateOfBirth[0];
    $dob_month   = $dateOfBirth[1];
    $dob_day  = $dateOfBirth[2];

    if(checkdate($dob_month, $dob_day, $dob_year)){
        $updateDob_d = customUpdateStaff("dob_d", $dob_day, $cs_no);
        $updateDob_m = customUpdateStaff("dob_m", $dob_month, $cs_no);
        $updateDob_y = customUpdateStaff("dob_y", $dob_year, $cs_no);
    }

    
    $updateSurname = customUpdateStaff("surname", $surname, $cs_no);
    $updateFirstName = customUpdateStaff("firstname", $firstname, $cs_no);
    $updateOtherName = customUpdateStaff("othername", $othername, $cs_no);
    $updateSex = customUpdateStaff("sex", $sex, $cs_no);
    $updateEmail = customUpdateStaff("email", $email, $cs_no);
    $updatePhone = customUpdateStaff("phone", $phone, $cs_no);
    $updateNOKName = customUpdateStaff("nok_fullname", $nok_fullname, $cs_no);
    $updateNOKPhone = customUpdateStaff("nok_phone", $nok_phone, $cs_no);
    $updateNOKAddress = customUpdateStaff("nok_address", $nok_address, $cs_no);



    

    if($updateSurname && $updateFirstName && $updateOtherName && $updateSex && $updateEmail && $updatePhone && $updateNOKName && $updateNOKPhone && $updateNOKAddress && $updateDob_d && $updateDob_m && $updateDob_y){
        $staffStatus = getEmpStatus( "cs_no", $cs_no);
        $updated_object = (object) ["status" => "updated", "emp_status" => $staffStatus["in_service"]
    ];
        // encoding array to json format
        echo json_encode($updated_object);
    }

}


?>