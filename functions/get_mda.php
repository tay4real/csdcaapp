<?php
require_once('../db_connect.php'); 
require_once ('utility.php');

// get all staff using custom search
function getMDA($code)
{
	$con=con();
	$table = $con->query("select * from mda WHERE  code = '".$code."'");
	return $table->fetch_array();
}

if(@validate($_POST['getMDA'])){
	$code = $_POST['code'];	
	$mda = getMDA($code);

	$mda_object = (object) ["code" => $mda["code"], "name" => $mda["name"]];
	// encoding array to json format
	echo json_encode($mda_object);

}


?>
