<?php
require_once('../db_connect.php'); 


function getAllCadres()
{
	$con=con();
	return $con->query("select DISTINCT (Cadre) from soscadres ORDER BY Cadre");
}

$cadres = getAllCadres();

$cadres_arr = array();

while ($row = $cadres->fetch_array()){    
    $cadres_arr[] = array( "cadre" => strtoupper($row['Cadre']));
}

// encoding array to json format
echo json_encode($cadres_arr);
?>