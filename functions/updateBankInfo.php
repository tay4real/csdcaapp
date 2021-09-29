<?php

require_once('../db_connect.php'); 
require_once ('utility.php');

function getEmpStatus($criteria, $value)
{
	$con=con();
	$table = $con->query("select in_service from staff_updated WHERE  $criteria like '%".$value."%'");
	return $table->fetch_array();
}


function updateBankInfo( $cs_no, $bank_name,$account_name,$account_no)
{
	$con=con();
	return $con->query("UPDATE staff_updated SET bank_name ='$bank_name', account_name ='$account_name', account_no = '$account_no' WHERE cs_no = '$cs_no'");
}

if (isset($_POST['upd_bankinfo'])) {
    $cs_no = $_POST['csn'];
    $bank_name = $_POST['bank_name'];
    $account_name = $_POST['account_name'];
    $account_no = $_POST['account_no'];
    

    $successfull = updateBankInfo( $cs_no, $bank_name,$account_name,$account_no);
    

    if($successfull){
        $updated_object = (object) ["bank_name" => $bank_name, "account_name" => $account_name, "account_no" => $account_no
    ];
        // encoding array to json format
        echo json_encode($updated_object);
    }

}


?>