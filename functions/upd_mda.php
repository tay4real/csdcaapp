<?php

require_once('../db_connect.php'); 
require_once ('utility.php');

function updMDA($code, $name){
	$con=con();
	return $con->query("UPDATE mda SET  name ='$name' WHERE code = '$code'");
}

if (isset($_POST['upd_mda'])) {
    $name = $_POST['name'];
	$code = $_POST['code'];
    $successful = updMDA($code, strtoUpper($name));

    if($successful)
    {
        $updated_object = (object) ["success" => "MDA updated successful", "name" => $name, "code" => $code ];
        // encoding array to json format
        echo json_encode($updated_object);
    }
    else
    {
        $updated_object = (object) ["error" => "Update failed" ];
        echo json_encode($updated_object);
    }
}

?>