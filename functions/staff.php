<?php

require_once('db_connect.php');

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

?>