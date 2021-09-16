<?php
require_once('../db_connect.php'); 


function getAllMDAs()
{
	$con=con();
	return $con->query("select * from mda ORDER BY name");
}

$mdas = getAllMDAs();

$mdas_arr = array();

while ($row = $mdas->fetch_array()){    
    $mdas_arr[] = array("code" => $row['code'], "name" => $row['name'] );
}

// encoding array to json format
echo json_encode($mdas_arr);
?>