
<?php
session_start();

require_once('../db_credentials.php');
require_once './utility.php';


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

if(@validate($_SESSION["user"]))
{
	
	 $user = getUser($_SESSION["user"]);
		  
	  if($user['role'] == "user"){
		   redirect("userstartup.php");
	  }
}else{
	redirect("index.php");
}

if(@validate($_SESSION["staff"])){
	$staff = $_SESSION["staff"];
}


$imagepath = "saved_images/". $cs_no . ".jpg";  
if(file_exists($imagepath)){
	$imagepath = $imagepath;
}else if(@validate($staff[4])){
	file_put_contents("./saved_images/$staff[1].jpg",$staff[4]);
$imagepath = "./saved_images/$staff[1].jpg";
} 

$reporter = "no";


if(@validate($_POST["cs_no"]))
{
	$con = con();
	$sql  = "SELECT * FROM staff ";
			$sql .= "WHERE cs_no = '{$_POST["cs_no"]}' ";
			
			//checking if the username is available in the table
        	$result =  $con->query($sql) ;
        	$count_row = $result->num_rows; 

			
			//if the csno is not in db then insert to the table
	        if ($count_row != 0) {
				$rp = "<b style='color:red'>CS Number: ". $_POST["cs_no"]. " already exist in database.</b>";
			}else {
				
			
	if(@validate($_POST["cadre"]) && @validate($_POST["level"]) ){
			$post = getPost($_POST["cadre"] ,$_POST["level"]);
		}
	
		$imagepath ="saved_images/". $cs_no . ".jpg"; 
		if(file_exists($imagepath)){
			$imagepath = $imagepath;
		}else if(@validate($staff[4])){
			file_put_contents("./saved_images/$staff[1].jpg",$staff[4]);
		$imagepath = "./saved_images/$staff[1].jpg";
		} 
		
		$id = "";
	
	$cs_no = (@validate($_POST["cs_no"])?strtoupper(addslashes($_POST["cs_no"])): "");
	$kia_no = (@validate($_POST["kia_no"])?addslashes($_POST["kia_no"]): "");
	$orin = (@validate($_POST["orin"])?addslashes($_POST["orin"]): "");
	$photopath = "saved_images/". $cs_no . ".jpg";  
	$surname = (@validate($_POST["surname"])?strtoupper(addslashes($_POST["surname"])): ""); 
	$firstname=(@validate($_POST["firstname"])?strtoupper(addslashes($_POST["firstname"])): "");
	$othername=(@validate($_POST["othername"])?strtoupper(addslashes($_POST["othername"])): "");
	$sex=(@validate($_POST["sex"])?strtoupper(addslashes($_POST["sex"])): "");
	$dob_d=(@validate($_POST["dob_d"])?addslashes($_POST["dob_d"]): "");
	$dob_m=(@validate($_POST["dob_d"])?addslashes($_POST["dob_m"]): "");
	$dob_y=(@validate($_POST["dob_y"])?addslashes($_POST["dob_y"]): "");
	$email=(@validate($_POST["email"])?addslashes($_POST["email"]): ""); 
	$phone=(@validate($_POST["phone"])?addslashes($_POST["phone"]): "");
	$nok_fullname=(@validate($_POST["nok_fullname"])?strtoupper(addslashes($_POST["nok_fullname"])): "");
	$nok_phone=(@validate($_POST["nok_phone"])?addslashes($_POST["nok_phone"]): "");
	$nok_address=(@validate($_POST["nok_address"])?strtoupper(addslashes($_POST["nok_address"])): "");
	$present_mda_lga=(@validate($_POST["present_mda_lga"])?addslashes($_POST["present_mda_lga"]): ""); 
	$present_mda_code=(@validate($_POST["present_mda_code"])?addslashes($_POST["present_mda_code"]): "");
	$parent_mda_code=(@validate($_POST["parent_mda_code"])?addslashes($_POST["parent_mda_code"]): "");
	$cadre=(@validate($_POST["cadre"])?strtoupper(addslashes($_POST["cadre"])): "");
	$level=(@validate($_POST["level"])?addslashes($_POST["level"]): "");
	$step=(@validate($_POST["step"])?addslashes($_POST["step"]): "");
	$designation=(@validate($post["Post"])?addslashes($post["Post"]): "");
	$dfa =(@validate($_POST["dfa"])?addslashes($_POST["dfa"]): "");
	$mfa=(@validate($_POST["mfa"])?addslashes($_POST["mfa"]): "");
	$yfa=(@validate($_POST["yfa"])?addslashes($_POST["yfa"]): ""); 
	$dpa=(@validate($_POST["dpa"])?addslashes($_POST["dpa"]): "");
	$mpa=(@validate($_POST["mpa"])?addslashes($_POST["mpa"]): ""); 
	$ypa=(@validate($_POST["ypa"])?addslashes($_POST["ypa"]): "");
	
	$retirement_year_by_age = (int)$dob_y + 60;
					$retirement_year_by_service = (int)$yfa + 35;
						
					if($dob_m == '01'){
						if($dob_d == '01'){
							$retirement_day_by_age = '31';
							$retirement_month_by_age = '12';
						}else
						$retirement_day_by_age = (int)$dob_d - 1;
						$retirement_month_by_age = (int)$dob_m;
					}else if($dob_m == '02'){
						if($dob_d == '01'){
							$retirement_day_by_age = '31';
							$retirement_month_by_age = '01';
						}else
						$retirement_day_by_age = (int)$dob_d - 1;
						$retirement_month_by_age = (int)$dob_m;
					}else if($dob_m == '03'){
						if($dob_d == '01'){
							$retirement_day_by_age = '28';
							$retirement_month_by_age = '02';
						}else
						$retirement_day_by_age = (int)$dob_d - 1;
						$retirement_month_by_age = (int)$dob_m;
					}else if($dob_m == '04'){
						if($dob_d == '01'){
							$retirement_day_by_age = '31';
							$retirement_month_by_age = '03';
						}else
						$retirement_day_by_age = (int)$dob_d - 1;
						$retirement_month_by_age = (int)$dob_m;
					}else if($dob_m == '05'){
						if($dob_d == '01'){
							$retirement_day_by_age = '30';
							$retirement_month_by_age = '04';
						}else
						$retirement_day_by_age = (int)$dob_d - 1;
						$retirement_month_by_age = (int)$dob_m;
					}else if($dob_m == '06'){
						if($dob_d == '01'){
							$retirement_day_by_age = '28';
							$retirement_month_by_age = '05';
						}else
						$retirement_day_by_age = (int)$dob_d - 1;
						$retirement_month_by_age = (int)$dob_m;
					}else if($dob_m == '07'){
						if($dob_d == '01'){
							$retirement_day_by_age = '30';
							$retirement_month_by_age = '06';
						}else
						$retirement_day_by_age = (int)$dob_d - 1;
						$retirement_month_by_age = (int)$dob_m;
					}else if($dob_m == '08'){
						if($dob_d == '01'){
							$retirement_day_by_age = '28';
							$retirement_month_by_age = '07';
						}else
						$retirement_day_by_age = (int)$dob_d - 1;
						$retirement_month_by_age = (int)$dob_m;
					}else if($dob_m == '09'){
						if($dob_d == '01'){
							$retirement_day_by_age = '28';
							$retirement_month_by_age = '08';
						}else
						$retirement_day_by_age = (int)$dob_d - 1;
						$retirement_month_by_age = (int)$dob_m;
					}else if($dob_m == '10'){
						if($dob_d == '01'){
							$retirement_day_by_age = '30';
							$retirement_month_by_age = '09';
						}else
						$retirement_day_by_age = (int)$dob_d - 1;
						$retirement_month_by_age = (int)$dob_m;
					}else if($dob_m == '11'){
						if($dob_d == '01'){
							$retirement_day_by_age = '28';
							$retirement_month_by_age = '10';
						}else
						$retirement_day_by_age = (int)$dob_d - 1;
						$retirement_month_by_age = (int)$dob_m;
					}else if($dob_m == '12'){
						if($dob_d == '01'){
							$retirement_day_by_age = '30';
							$retirement_month_by_age = '11';
						}else
						$retirement_day_by_age = (int)$dob_d - 1;
						$retirement_month_by_age = (int)$dob_m;
					}
					
					if($mfa == '01'){
						if($dfa == '01'){
							$retirement_day_by_service = '28';
							$retirement_month_by_service = '12';
						}else
						$retirement_day_by_service = (int)$dfa - 1;
						$retirement_month_by_service = (int)$mfa;
					}else if($mfa == '02'){
						if($dfa == '01'){
							$retirement_day_by_service = '28';
							$retirement_month_by_service = '01';
						}else
						$retirement_day_by_service = (int)$dfa - 1;
						$retirement_month_by_service = (int)$mfa;
					}else if($mfa == '03'){
						if($dfa == '01'){
							$retirement_day_by_service = '28';
							$retirement_month_by_service = '02';
						}else
						$retirement_day_by_service = (int)$dfa - 1;
						$retirement_month_by_service = (int)$mfa;
					}else if($mfa == '04'){
						if($dfa == '01'){
							$retirement_day_by_service = '28';
							$retirement_month_by_service = '03';
						}else
						$retirement_day_by_service = (int)$dfa - 1;
						$retirement_month_by_service = (int)$mfa;
					}else if($mfa == '05'){
						if($dfa == '01'){
							$retirement_day_by_service = '30';
							$retirement_month_by_service = '04';
						}else
						$retirement_day_by_service = (int)$dfa - 1;
						$retirement_month_by_service = (int)$mfa;
					}else if($mfa == '06'){
						if($dfa == '01'){
							$retirement_day_by_service = '28';
							$retirement_month_by_service = '05';
						}else
						$retirement_day_by_service = (int)$dfa - 1;
						$retirement_month_by_service = (int)$mfa;
					}else if($mfa == '07'){
						if($dfa == '01'){
							$retirement_day_by_service = '30';
							$retirement_month_by_service = '06';
						}else
						$retirement_day_by_service = (int)$dfa - 1;
						$retirement_month_by_service = (int)$mfa;
					}else if($mfa == '08'){
						if($dfa == '01'){
							$retirement_day_by_service = '28';
							$retirement_month_by_service = '07';
						}else
						$retirement_day_by_service = (int)$dfa - 1;
						$retirement_month_by_service = (int)$mfa;
					}else if($mfa == '09'){
						if($dfa == '01'){
							$retirement_day_by_service = '28';
							$retirement_month_by_service = '08';
						}else
						$retirement_day_by_service = (int)$dfa - 1;
						$retirement_month_by_service = (int)$mfa;
					}else if($mfa == '10'){
						if($dfa == '01'){
							$retirement_day_by_service = '30';
							$retirement_month_by_service = '09';
						}else
						$retirement_day_by_service = (int)$dfa - 1;
						$retirement_month_by_service = (int)$mfa;
					}else if($mfa == '11'){
						if($dfa == '01'){
							$retirement_day_by_service = '28';
							$retirement_month_by_service = '10';
						}else
						$retirement_day_by_service = (int)$dfa - 1;
						$retirement_month_by_service = (int)$mfa;
					}else if($mfa == '12'){
						if($dfa == '01'){
							$retirement_day_by_service = '30';
							$retirement_month_by_service = '11';
						}else
						$retirement_day_by_service = (int)$dfa - 1;
						$retirement_month_by_service = (int)$mfa;
					}
					
					
					if($retirement_year_by_age < $retirement_year_by_service ){		
						$retirement_year = $retirement_year_by_age;
						$retirement_month = $retirement_month_by_age;
						$retirement_day = $retirement_day_by_age;
						$retirement_criteria = "age";
					}else{
						$retirement_year = $retirement_year_by_service;
						$retirement_month = $retirement_month_by_service;
						$retirement_day = $retirement_day_by_service;
						$retirement_criteria = "length of service";
					} 
	$salary_pay_point=(@validate($_POST["salary_pay_point"])?addslashes($_POST["salary_pay_point"]): "");
	$bank_name=(@validate($_POST["bank_name"])?addslashes($_POST["bank_name"]): "");
	$account_name=(@validate($_POST["account_name"])?strtoupper(addslashes($_POST["account_name"])): ""); 
	$account_no=(@validate($_POST["account_no"])?addslashes($_POST["account_no"]): ""); 
	$bvn=(@validate($_POST["bvn"])?addslashes($_POST["bvn"]): "");
	$pry_certificate=(@validate($_POST["pry_certificate"])?strtoupper(addslashes($_POST["pry_certificate"])): "");
	$jss3_certificate=(@validate($_POST["jss3_certificate"])?strtoupper(addslashes($_POST["jss3_certificate"])): ""); 
	$sss_certificates=(@validate($_POST["sss_certificates"])?strtoupper(addslashes($_POST["sss_certificates"])): ""); 
	$tertiary_certificates=(@validate($_POST["tertiary_certificates"])?strtoupper(addslashes($_POST["tertiary_certificates"])): ""); 
	$pg_certificates=(@validate($_POST["pg_certificates"])?strtoupper(addslashes($_POST["pg_certificates"])): "");
	$doctoral_certificates=(@validate($_POST["doctoral_certificates"])?strtoupper(addslashes($_POST["doctoral_certificates"])): "");
	$prof_qual_international=(@validate($_POST["prof_qual_international"])?strtoupper(addslashes($_POST["prof_qual_international"])): "");
	$prof_qual_national=(@validate($_POST["prof_qual_national"])?strtoupper(addslashes($_POST["prof_qual_national"])): ""); 
	$prof_qual_achievement=(@validate($_POST["prof_qual_achievement"])?strtoupper(addslashes($_POST["prof_qual_achievement"])): "");
	$prof_qual_others=(@validate($_POST["prof_qual_others"])?strtoupper(addslashes($_POST["prof_qual_others"])): "");
	$prof_mem_international=(@validate($_POST["prof_mem_international"])?strtoupper(addslashes($_POST["prof_mem_international"])): "");
	$prof_mem_national=(@validate($_POST["prof_mem_national"])?strtoupper(addslashes($_POST["prof_mem_national"])): ""); 
	$prof_mem_others=(@validate($_POST["prof_mem_others"])?strtoupper(addslashes($_POST["prof_mem_others"])): "");
	$transfer_movt="NA"; 
	if(date('Y') <= $retirement_year){
		$in_service = "yes";	
	}else{
		$in_service= "no"; 
	}
	$user_id= "1"; 
	$reg_date= date('Ymd'); 
	$batch_index= "NA";
	$type_of_service = "CORE CIVIL SERVICE";
				
	if(file_exists($photopath))
		{
			$msg = addStaff($cs_no,$kia_no,$orin,$photopath,$surname,$firstname,$othername,$sex,$dob_d,$dob_m,$dob_y,$email,$phone,$nok_fullname,$nok_phone,$nok_address,$present_mda_lga,$present_mda_code,$parent_mda_code,$cadre,$level,$step,$designation,$dfa,$mfa,$yfa,$dpa,$mpa,$ypa,$retirement_day,$retirement_month,$retirement_year,$retirement_criteria,$salary_pay_point,$bank_name,$account_name,$account_no,$bvn,$pry_certificate, $jss3_certificate,$sss_certificates,$tertiary_certificates,$pg_certificates,$doctoral_certificates,$prof_qual_international,$prof_qual_national,$prof_qual_achievement,$prof_qual_others,$prof_mem_international,$prof_mem_national,$prof_mem_others,$transfer_movt,$in_service,$user_id,$reg_date,$batch_index,$type_of_service);
			if($msg)
			{
				$reporter="yes";
				$rp = "<b style='color:green'>SUCCESSFUL: Your Data has been successfully Submitted</b>";
				$id = "";$_POST['cs_no'] = "";$kia_no = "";$orin = "";$photo = ""; $surname = ""; $firstname=""; $othername=""; $sex=""; $dob_d="";$dob_m=""; $dob_y=""; $email=""; $phone=""; $nok_fullname=""; $nok_phone=""; $nok_address=""; $present_mda_lga=""; $present_mda_code="";$parent_mda_code=""; $cadre=""; $level=""; $step=""; $designation=""; $dfa =""; $mfa=""; $yfa=""; $dpa=""; $mpa=""; $ypa=""; $retirement_year=""; $retirement_criteria=""; $salary_pay_point=""; $bank_name=""; $account_name=""; $account_no=""; $bvn=""; $pry_certificate=""; $jss3_certificate=""; $sss_certificates=""; $tertiary_certificates=""; $pg_certificates=""; $doctoral_certificates=""; $prof_qual_international=""; $prof_qual_national=""; $prof_qual_achievement=""; $prof_qual_others=""; $prof_mem_international=""; $prof_mem_national=""; $prof_mem_others=""; $transfer_movt=""; $in_service=""; $user_id=""; $reg_date=""; $batch_index="";$reporter = "";
				unset($staff["cs_no"]);
			}
			else
			{
				$rp = "<b style='color:red'>CS Number: ". $cs_no. " already exist in database.</b>";
				$id = "";$cs_no = "";$kia_no = "";$orin = "";$photo = ""; $surname = ""; $firstname=""; $othername=""; $sex=""; $dob_d="";$dob_m=""; $dob_y=""; $email=""; $phone=""; $nok_fullname=""; $nok_phone=""; $nok_address=""; $present_mda_lga=""; $present_mda_code="";$parent_mda_code=""; $cadre=""; $level=""; $step=""; $designation=""; $dfa =""; $mfa=""; $yfa=""; $dpa=""; $mpa=""; $ypa=""; $retirement_year=""; $retirement_criteria=""; $salary_pay_point=""; $bank_name=""; $account_name=""; $account_no=""; $bvn=""; $pry_certificate=""; $jss3_certificate=""; $sss_certificates=""; $tertiary_certificates=""; $pg_certificates=""; $doctoral_certificates=""; $prof_qual_international=""; $prof_qual_national=""; $prof_qual_achievement=""; $prof_qual_others=""; $prof_mem_international=""; $prof_mem_national=""; $prof_mem_others=""; $transfer_movt=""; $in_service=""; $user_id=""; $reg_date=""; $batch_index="";$reporter = "";	
			}
		}
		else
		{
			$rp = "<b style='color:red'>UNSUCCESSFUL: Face Biometrics not captured yet</b>";	
		}
	
			}
			
}
else
{
	$id = "";$cs_no = "";$kia_no = "";$orin = "";$photo = ""; $surname = ""; $firstname=""; $othername=""; $sex=""; $dob_d="";$dob_m=""; $dob_y=""; $email=""; $phone=""; $nok_fullname=""; $nok_phone=""; $nok_address=""; $present_mda_lga=""; $present_mda_code="";$parent_mda_code=""; $cadre=""; $level=""; $step=""; $designation=""; $dfa =""; $mfa=""; $yfa=""; $dpa=""; $mpa=""; $ypa=""; $retirement_year=""; $retirement_criteria=""; $salary_pay_point=""; $bank_name=""; $account_name=""; $account_no=""; $bvn=""; $pry_certificate=""; $jss3_certificate=""; $sss_certificates=""; $tertiary_certificates=""; $pg_certificates=""; $doctoral_certificates=""; $prof_qual_international=""; $prof_qual_national=""; $prof_qual_achievement=""; $prof_qual_others=""; $prof_mem_international=""; $prof_mem_national=""; $prof_mem_others=""; $transfer_movt=""; $in_service=""; $user_id=""; $reg_date=""; $batch_index="";$reporter = "";
}

if(@validate($_POST["cs_no"])){
	$staff = getStaff($_POST["cs_no"]);
}
?>