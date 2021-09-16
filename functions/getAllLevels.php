<?php
require_once('../db_connect.php'); 



function getAllLevels()
{
	$con=con();
	return $con->query("select DISTINCT (GL) from soscadres ORDER BY id");
}



	$levels = getAllLevels();

	$levels_arr = array();

	while ($row = $levels->fetch_array()){    
		$levels_arr[] = array( "level" => strtoupper($row['GL']));
	}

	// encoding array to json format
	echo json_encode($levels_arr);

?>