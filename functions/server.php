<?php
require_once('../db_credentials.php');
require_once './utility.php';

// get all staff 
function getAllUsers(){
	$con=con();
	return $con->query("select * from users ORDER BY username");
}

// returns a user by username
function getUser($username)
{
	$con=con();
	$table=$con->query("select * from users WHERE username = '$username'");
	return $table->fetch_array();	
}


// description: authenticate user by username and password
function auth_user($username,$password)
{
	$con=con();
	$con->query("select * from users where username='$username' and 
	password='$password'");
	return $con->affected_rows==1;
}

function deleteUser($user_id){
	$con=con();
	$con->query("DELETE FROM users WHERE id = '$user_id'");
}

// description: total number of staff
function getTotalNumOfStaff(){
	$con=con();
	$sql  = "SELECT * FROM staff_updated";	
	$result =  $con->query($sql) ;
    return $result->num_rows; 
}

// description: return all staff record
function getAllStaff(){
	$con=con();
	return $con->query("select * from staff_updated ORDER BY cs_no");
}


// description: return total number of staff by presesnt mda
function getStaffStrengthByPresentMDA($mda_code){
	$con=con();
	$sql  = "SELECT * FROM staff_updated WHERE present_mda_code = '$mda_code'";	
    $result =  $con->query($sql) ;
    return $result->num_rows; 
}

// description: return staff by presesnt mda
function getStaffbyPresentMDA($mda_code){
	$con=con();
	return $con->query("select * from staff_updated WHERE present_mda_code = '$mda_code'");
}

// description: return staff by presesnt mda
function getStaffbyParentMDA($mda_code){
	$con=con();
	return $con->query("select * from staff_updated WHERE parent_mda_code = '$mda_code'");
}

// get all staff using custom search
function getStaffbyCriteria($criteria, $value)
{
	$con=con();
	$table = $con->query("select * from staff_updated WHERE  $criteria like '%".$value."%'");
	return $table->fetch_array();
}

// function to add staff
function addStaff($cs_no,$kia_no,$orin,$photopath,$surname,$firstname,$othername,$sex,$dob_d,$dob_m,$dob_y,$email,$phone,$nok_fullname,$nok_phone,$nok_address,$present_mda_lga,$present_mda_code,$parent_mda_code,$cadre,$level,$step,$designation,$dfa,$mfa,$yfa,$dpa,$mpa,$ypa,$retirement_day,$retirement_month,$retirement_year,$retirement_criteria,$salary_pay_point,$bank_name,$account_name,$account_no,$bvn,$pry_certificate, $jss3_certificate,$sss_certificates,$tertiary_certificates,$pg_certificates,$doctoral_certificates,$prof_qual_international,$prof_qual_national,$prof_qual_achievement,$prof_qual_others,$prof_mem_international,$prof_mem_national,$prof_mem_others,$transfer_movt,$in_service,$user_id,$reg_date,$batch_index,$type_of_service)
{
	$con=con();
	//checking if staff record is available in db
			$sql  = "SELECT * FROM staff_updated ";
			$sql .= "WHERE cs_no = '{$cs_no}' ";
			
			//checking if the cs_no is available in the table
        	$result =  $con->query($sql) ;
        	$count_row = $result->num_rows; 

			
			//if the csno is not in db then insert to the table
	        if ($count_row == 0) {
	            return $con->query("insert into staff_updated 
                    (cs_no,kia_no,orin,photopath,surname,firstname,othername,sex,dob_d,dob_m,dob_y,email,phone,nok_fullname,nok_phone,nok_address,present_mda_lga,present_mda_code,parent_mda_code,cadre,level,step,designation,dfa,mfa,yfa,dpa,mpa,ypa,retirement_day,retirement_month,retirement_year,retirement_criteria,salary_pay_point,bank_name,account_name,account_no,bvn,pry_certificate, jss3_certificate,sss_certificates,tertiary_certificates,pg_certificates,doctoral_certificates,prof_qual_international,prof_qual_national,prof_qual_achievement,prof_qual_others,prof_mem_international,prof_mem_national,prof_mem_others,transfer_movt,in_service,user_id,reg_date,batch_index,type_of_service)values('$cs_no','$kia_no','$orin','$photopath','$surname','$firstname','$othername','$sex','$dob_d','$dob_m','$dob_y','$email','$phone','$nok_fullname','$nok_phone','$nok_address','$present_mda_lga','$present_mda_code','$parent_mda_code','$cadre','$level','$step','$designation','$dfa','$mfa','$yfa','$dpa','$mpa','$ypa','$retirement_day','$retirement_month','$retirement_year','$retirement_criteria','$salary_pay_point','$bank_name','$account_name','$account_no','$bvn','$pry_certificate', '$jss3_certificate','$sss_certificates','$tertiary_certificates','$pg_certificates','$doctoral_certificates','$prof_qual_international','$prof_qual_national','$prof_qual_achievement','$prof_qual_others','$prof_mem_international','$prof_mem_national','$prof_mem_others','$transfer_movt','$in_service','$user_id','$reg_date','$batch_index','$type_of_service')");
	
			}else {
				return false;
			}
}


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

// custom update
function customUpdateStaff($col, $val, $cs_no)
{
	$con=con();
	//checking if staff record is available in db
			
	return $con->query("UPDATE staff_updated SET $col  ='$val' WHERE cs_no = '$cs_no'");
	//echo $con->error;
			
}




// returns MDA with code specifiied
function getMDA($code)
{
	$con=con();
	$table=$con->query("select * from mda WHERE code = '$code'");
	return $table->fetch_array();	
}


// return all LGAs
function getAllLGA()
{
	$con=con();
	return $con->query("select * from lga ORDER BY id");
}

// returns distinct cadres
function getAllCadres()
{
	$con=con();
	return $con->query("select DISTINCT (Cadre) from soscadres ORDER BY Cadre");
}

// returns distinct cadre levels
function getAllLevels()
{
	$con=con();
	return $con->query("select DISTINCT (GL) from soscadres ORDER BY id");
}

// returns Grade levels by Cadre
function getLevels($cadre)
{
	$con=con();
	$table=$con->query("select id,GL from soscadres WHERE Cadre = '$cadre'");
	return $table->fetch_array();	
}

// returns post by cadre and level
function getPost($cadre, $level)
{
	$con=con();
	$table=$con->query("select * from soscadres WHERE Cadre = '$cadre' AND GL = '$level'");
	return $table->fetch_array();	
}









?>