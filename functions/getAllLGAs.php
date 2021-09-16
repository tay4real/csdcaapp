<?php
require_once('../db_connect.php'); 


function getAllLGAs()
{
	$con=con();
	return $con->query("select * from lga ORDER BY id");
}

$lgas = getAllLGAs();

$lgas_arr = array();

while ($row = $lgas->fetch_array()){    
    $lgas_arr[] = array( "name" => $row['name'] );
}

// encoding array to json format
echo json_encode($lgas_arr);
?>