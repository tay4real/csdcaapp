<?php

require_once('../db_connect.php'); 
require_once ('utility.php');

function addMDA($code, $name){
	$con=con();
	//checking if staff record is available in db
	$sql  = "SELECT * FROM mda WHERE code = '{$code}'";
	
	$result =  $con->query($sql) ;
	$count_row = $result->num_rows; 
	
	if ($count_row == 0) {
		return $con->query("INSERT INTO mda SET code = '{$code}',name = '{$name}' ");
	}else {
		return false;
	}
}

if (isset($_POST['addMDA'])) {
    $name = $_POST['mda'];
	$code = uniqid();
    
    $successful = addMDA($code, strtoUpper($name));
    if($successful)
    {
        $updated_object = (object) ["success" => "MDA added successful" ];
        // encoding array to json format
        echo json_encode($updated_object);
    }
    else
    {
        $updated_object = (object) ["error" => "An error occurred: MDA may already exist in DB" ];
        echo json_encode($updated_object);
    }
}

?>