<?php
require_once('../db_connect.php'); 



function getAllBanks()
{
	$con=con();
	return $con->query("select * from banks ORDER BY id");
}


	$banks = getAllBanks();

	$banks_arr = array();

	while ($row = $banks->fetch_array()){    
		$banks_arr[] = array( "name" => strtoupper($row['name']));
	}

	// encoding array to json format
	echo json_encode($banks_arr);

?>