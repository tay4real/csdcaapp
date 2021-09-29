<?php

require_once('../db_connect.php'); 
require_once ('utility.php');

function getUser($cs_no)
{
	$con=con();
	$table=$con->query("select * from staff_updated WHERE cs_no = '$cs_no'");
	return $table->fetch_array();	
}

if (isset($_POST['autofill'])) {
    $cs_no = $_POST['csn'];
    

    $user = getUser(strtoupper($cs_no));

    if($user){
        
        $fullname = $user["surname"] . " " . $user["firstname"];

        $updated_object = (object) ["username" => $user["cs_no"], "fullname" => $fullname, "phone" => $user["phone"], "email" => $user["email"], "sex" => $user["sex"] ];
        // encoding array to json format
        echo json_encode($updated_object);
    }else{
        $updated_object = (object) ["error" => "CS Number not found in Database" ];
        echo json_encode($updated_object);
    }

}


?>