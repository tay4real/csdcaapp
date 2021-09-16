<?php
require_once('../db_connect.php'); 


function getStaffList()
{
	$con=con();
	return $con->query("select * from staff_updated ORDER BY cs_no");
}

$staff = getStaffList();
$staff_arr = array();

while ($row = $mdas->fetch_array()){    
    $mdas_arr[] = array("code" => $row['code'], "name" => $row['name'] );
}

// encoding array to json format
echo json_encode($mdas_arr);
?>