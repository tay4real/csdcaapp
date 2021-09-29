<?php

require_once('../db_connect.php'); 
require_once ('utility.php');

function addUser($username, $password, $fullname, $sex, $email, $phone, $role, $status){
	$con=con();
	    //checking if staff record is available in db
        $sql  = "SELECT * FROM users ";
        $sql .= "WHERE username = '{$username}' ";
			
        //checking if the username is available in the table
        $result =  $con->query($sql) ;
        $count_row = $result->num_rows; 

		
        if ($count_row == 0) {
	        return $con->query("INSERT INTO users SET username = '{$username}',password = '{$password}', fullname='{$fullname}', sex = '{$sex}', email='{$email}',phone = '{$phone}',role = '{$role}', status = '{$status}' ");
        }else {
            return false;
        }

}

if (isset($_POST['registerUser'])) {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $sex = $_POST['sex'];
    $status = $_POST['status'];
    $role = $_POST['role'];
    $password =  sha1("password@1");
    
    $successful = addUser(strtoupper($username), $password, $fullname, $sex, $email, $phone, $role, $status);
    if($successful)
    {
        $updated_object = (object) ["success" => "User registration successful" ];
        // encoding array to json format
        echo json_encode($updated_object);
    }
    else
    {
        $updated_object = (object) ["error" => "User already registered" ];
        echo json_encode($updated_object);
    }

}


?>