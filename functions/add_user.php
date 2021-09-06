<?php

function addUser($cs_no, $username, $password, $fullname, $sex, $email, $phone, $role, $status, $entries){
	$con=con();
	//checking if staff record is available in db
			$sql  = "SELECT * FROM users ";
			$sql .= "WHERE username = '{$username}' ";
			
			//checking if the username is available in the table
        	$result =  $con->query($sql) ;
        	$count_row = $result->num_rows; 

			
			//if the username is not in db then insert to the table
	        if ($count_row == 0) {
	            return $con->query("INSERT INTO users SET username = '{$username}',password = '{$password}', fullname='{$fullname}', sex = '{$sex}', email='{$email}',phone = '{$phone}',role = '{$role}', status = '{$status}', entries = '{$entries}'");
	            
			}else {
				return false;
			}

}


?>