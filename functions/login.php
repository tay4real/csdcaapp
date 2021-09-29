<?php

require_once('../db_connect.php'); 
require_once ('utility.php');


function auth_user($username,$password)
{
	$con=con();
	$con->query("select * from users where username='$username' and 
	password='$password'");
	return $con->affected_rows==1;
}

function getUser($username)
{
	$con=con();
	$table=$con->query("select * from users WHERE username = '$username'");
	return $table->fetch_array();	
}


if (isset($_POST['login'])) {

    $uname = $_POST['username'];
    $password = $_POST['password'];

    if(@validate($uname) && @validate($password)){
        if(auth_user($uname,sha1($password))){
            session_start();
            $user = getUser($uname);
    
            if($user){
                $username = $user['username'];
                $role = $user['role'];
                $fullname = $user['fullname'];
                $sex = $user['sex'];
                $email = $user['email'];
                $phone = $user['phone'];
                $status = $user['status'];
    
                $userdata = (object) ["username" => $username, "role" => $role, "fullname" => $fullname, "sex" => $sex, "email" => $email, "phone" => $phone, "status" => $status ];
    
                $_SESSION["userdata"] = $userdata;
                
                echo json_encode($userdata );
            }  
            
        }else{
            $userdata = (object) ["error" => "Username or Password Incorrect" ];
            echo json_encode($userdata );
        }
    }
    
   
  
}


?>