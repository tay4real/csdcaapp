<?php
require_once('../db_connect.php'); 
require_once ('utility.php');

// get all staff using custom search
function getStaffbyCriteria($criteria, $value)
{
	$con=con();
	$table = $con->query("select * from staff_updated WHERE  $criteria like '%".$value."%'");
	return $table->fetch_array();
}



if(@validate($_POST['csn'])){
	$cs = $_POST['csn'];	
	$staff = getStaffbyCriteria( "cs_no", $cs);
	$imagepath = "./saved_images/$staff[1].jpg";


	$staff_object = (object) ["cs_no" => $staff["cs_no"], "surname" => $staff["surname"], "firstname" => $staff["firstname"], "othername" => $staff["othername"], "sex" => $staff["sex"], "dob_d" => $staff["dob_d"], "dob_m" => $staff["dob_m"], "dob_y" => $staff["dob_y"], "email" => $staff["email"] , "phone" => $staff["phone"] , "nok_fullname" => $staff["nok_fullname"], "nok_phone" => $staff["nok_phone"], "nok_address" => $staff["nok_address"], "present_mda_lga" => $staff["present_mda_lga"] , "present_mda_code" => $staff["present_mda_code"], "parent_mda_code" => $staff["parent_mda_code"] , "cadre" => $staff["cadre"] , "level" => $staff["level"], "level" => $staff["level"], "step" => $staff["step"] ,  "designation" => $staff["designation"] , "dfa" => $staff["dfa"] , "mfa" => $staff["mfa"] , "yfa" => $staff["yfa"] , "dpa" => $staff["dpa"] , "mpa" => $staff["mpa"] , "ypa" => $staff["ypa"],"retirement_day" => $staff["retirement_day"],"retirement_month" => $staff["retirement_month"], "retirement_year" => $staff["retirement_year"], "salary_pay_point" => $staff["salary_pay_point"], "bank_name" => $staff["bank_name"], "account_name" => $staff["account_name"], "account_no" => $staff["account_no"], "pry_certificate" => $staff["pry_certificate"], "jss3_certificate" => $staff["jss3_certificate"], "sss_certificates" => $staff["sss_certificates"], "tertiary_certificates" => $staff["tertiary_certificates"], "pg_certificates" => $staff["pg_certificates"], "doctoral_certificates" => $staff["doctoral_certificates"],
	"prof_qual_international" => $staff["prof_qual_international"], "prof_qual_national" => $staff["prof_qual_national"], "prof_qual_achievement" => $staff["prof_qual_achievement"],
	"prof_qual_others" => $staff["prof_qual_others"], "prof_mem_international" => $staff["prof_mem_international"], "prof_mem_national" => $staff["prof_mem_national"], "prof_mem_others" => $staff["prof_mem_others"], "photopath" => $staff["photopath"], "imagepath" => $imagepath
];
	// encoding array to json format
	echo json_encode($staff_object);

}


?>
