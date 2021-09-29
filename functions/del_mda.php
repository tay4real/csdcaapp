<?php

require_once('../db_connect.php'); 
require_once ('utility.php');


function delMDA($code){
	$con=con();
	$con->query("DELETE FROM mda WHERE code = '$code'");
}


if (isset($_POST['delMDA'])) {
  
	$code = $_POST['code'];

    $successful = delMDA($code);

    if($successful)
    {
        $updated_object = (object) ["success" => "MDA deleted successful" ];
        // encoding array to json format
        echo json_encode($updated_object);
    }
    else
    {
        $updated_object = (object) ["error" => "Delete failed" ];
        echo json_encode($updated_object);
    }

  
}

?>