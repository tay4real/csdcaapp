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

	// explode all qualififications and certifications to arrays
	$pry_certificate = "";
	$jss3_certificate = "";
	$sss_certificates = "";
	$tertiary_certificates = "";
	$pg_certificates = "";
	$doctoral_certificates = "";
	$prof_qual_international = "";
	$prof_qual_national = "";
	$prof_mem_international = "";
	$prof_mem_national = "";
	$prof_mem_others = "";

	if($staff["pry_certificate"] !== "NA" && $staff["pry_certificate"] !== ""){
		$pry_certificate = explode(',', $staff["pry_certificate"]);
	}
	if($staff["jss3_certificate"] !== "NA" && $staff["jss3_certificate"] !== ""){
		$jss3_certificate = explode(',', $staff["jss3_certificate"]);
	}
	if($staff["sss_certificates"] !== "NA" && $staff["sss_certificates"] !== ""){
		$sss_certificates = explode(',', $staff["sss_certificates"]);
	}
	if($staff["tertiary_certificates"] !== "NA" && $staff["tertiary_certificates"] !== ""){
		$tertiary_certificates = explode(',', $staff["tertiary_certificates"]);
	}
	if($staff["pg_certificates"] !== "NA" && $staff["pg_certificates"] !== ""){
		$pg_certificates = explode(',', $staff["pg_certificates"]);
	}
	if($staff["doctoral_certificates"] !== "NA" && $staff["doctoral_certificates"] !== ""){
		$doctoral_certificates = explode(',', $staff["doctoral_certificates"]);
	}
	if($staff["prof_qual_international"] !== "NA" && $staff["prof_qual_international"] !== ""){
		$prof_qual_international = explode(',', $staff["prof_qual_international"]);
	}
	if($staff["prof_qual_national"] !== "NA" && $staff["prof_qual_national"] !== ""){
		$prof_qual_national = explode(',', $staff["prof_qual_national"]);
	}
	if($staff["prof_mem_international"] !== "NA" && $staff["prof_mem_international"] !== ""){
		$prof_mem_international = explode(',', $staff["prof_mem_international"]);
	}
	if($staff["prof_mem_national"] !== "NA" && $staff["prof_mem_national"] !== ""){
		$prof_mem_national = explode(',', $staff["prof_mem_national"]);
	}
	if($staff["prof_mem_others"] !== "NA" && $staff["prof_mem_others"] !== ""){
		$prof_mem_others = explode(',', $staff["prof_mem_others"]);
	}
	
	


	$staff_object = (object) ["cs_no" => $staff["cs_no"], "surname" => $staff["surname"], "firstname" => $staff["firstname"], "othername" => $staff["othername"], "sex" => $staff["sex"], "dob_d" => $staff["dob_d"], "dob_m" => $staff["dob_m"], "dob_y" => $staff["dob_y"], "email" => $staff["email"] , "phone" => $staff["phone"] , "nok_fullname" => $staff["nok_fullname"], "nok_phone" => $staff["nok_phone"], "nok_address" => $staff["nok_address"], "present_mda_lga" => $staff["present_mda_lga"] , "present_mda_code" => $staff["present_mda_code"], "parent_mda_code" => $staff["parent_mda_code"] , "cadre" => $staff["cadre"] , "level" => $staff["level"], "level" => $staff["level"], "step" => $staff["step"] ,  "designation" => $staff["designation"] , "dfa" => $staff["dfa"] , "mfa" => $staff["mfa"] , "yfa" => $staff["yfa"] , "dpa" => $staff["dpa"] , "mpa" => $staff["mpa"] , "ypa" => $staff["ypa"],"retirement_day" => $staff["retirement_day"],"retirement_month" => $staff["retirement_month"], "retirement_year" => $staff["retirement_year"], "salary_pay_point" => $staff["salary_pay_point"], "bank_name" => $staff["bank_name"], "account_name" => $staff["account_name"], "account_no" => $staff["account_no"], "pry_certificate" => $staff["pry_certificate"], "jss3_certificate" => $staff["jss3_certificate"], "sss_certificates" => $staff["sss_certificates"], "tertiary_certificates" => $staff["tertiary_certificates"], "pg_certificates" => $staff["pg_certificates"], "doctoral_certificates" => $staff["doctoral_certificates"],
	"prof_qual_international" => $staff["prof_qual_international"], "prof_qual_national" => $staff["prof_qual_national"], "prof_qual_achievement" => $staff["prof_qual_achievement"],
	"prof_qual_others" => $staff["prof_qual_others"], "prof_mem_international" => $staff["prof_mem_international"], "prof_mem_national" => $staff["prof_mem_national"], "prof_mem_others" => $staff["prof_mem_others"], "photopath" => $staff["photopath"], "imagepath" => $imagepath, "emp_status" => $staff["in_service"]
];
	// encoding array to json format
	echo json_encode($staff_object);

}


?>
