<?php

// update staff retirement status
function updateStaffRetirement($cs_no,$retirement_day,$retirement_month,$retirement_year,$retirement_criteria)
{
	$con=con();
	//checking if staff record is available in db
			
	return $con->query("UPDATE staff_updated SET  retirement_day = '$retirement_day',retirement_month = '$retirement_month',retirement_year = '$retirement_year', retirement_criteria = '$retirement_criteria' WHERE cs_no = '$cs_no'");
	//echo $con->error;
			
}

// update staff record
function updateStaff($cs_no,$kia_no,$orin,$photopath,$surname,$firstname,$othername,$sex,$dob_d,$dob_m,$dob_y,$email,$phone,$nok_fullname,$nok_phone,$nok_address,$present_mda_lga,$present_mda_code,$parent_mda_code,$cadre,$level,$step,$designation,$dfa,$mfa,$yfa,$dpa,$mpa,$ypa,$retirement_day,$retirement_month,$retirement_year,$retirement_criteria,$salary_pay_point,$bank_name,$account_name,$account_no,$bvn,$pry_certificate, $jss3_certificate,$sss_certificates,$tertiary_certificates,$pg_certificates,$doctoral_certificates,$prof_qual_international,$prof_qual_national,$prof_qual_achievement,$prof_qual_others,$prof_mem_international,$prof_mem_national,$prof_mem_others,$transfer_movt,$in_service,$user_id,$reg_date,$batch_index,$type_of_service)
{
	$con=con();
	//checking if staff record is available in db
			
	return $con->query("UPDATE staff_updated SET kia_no  ='$kia_no', orin ='$orin', photopath='$photopath', surname='$surname', firstname='$firstname', othername='$othername',sex='$sex',dob_d='$dob_d',dob_m='$dob_m',dob_y='$dob_y',email='$email',phone='$phone',nok_fullname='$nok_fullname',nok_phone='$nok_phone',nok_address='$nok_address',present_mda_lga='$present_mda_lga', present_mda_code='$present_mda_code', parent_mda_code = '$parent_mda_code', cadre = '$cadre', level = '$level', step = '$step', designation = '$designation', dfa = '$dfa', mfa ='$mfa' ,yfa = '$yfa', dpa = '$dpa', mpa = '$mpa', ypa = '$ypa', retirement_day = '$retirement_day',retirement_month = '$retirement_month',retirement_year = '$retirement_year', retirement_criteria = '$retirement_criteria', salary_pay_point = '$salary_pay_point', bank_name ='$bank_name', account_name ='$account_name', account_no = '$account_no', bvn = '$bvn', pry_certificate = '$pry_certificate', jss3_certificate = '$jss3_certificate', sss_certificates = '$sss_certificates', tertiary_certificates ='$tertiary_certificates', pg_certificates = '$pg_certificates',doctoral_certificates = '$doctoral_certificates', prof_qual_international='$prof_qual_international', prof_qual_national='$prof_qual_national', prof_qual_achievement='$prof_qual_achievement', prof_qual_others = '$prof_qual_others', prof_mem_international = '$prof_mem_international', prof_mem_national ='$prof_mem_national', prof_mem_others = '$prof_mem_others', transfer_movt = '$transfer_movt', in_service = '$in_service', user_id = '$user_id', reg_date = '$reg_date', batch_index = '$batch_index', type_of_service= '$type_of_service' WHERE cs_no = '$cs_no'");
	//echo $con->error;
			
}



?>
