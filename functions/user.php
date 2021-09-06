<?php
// get all staff 
function getAllUsers(){
	$con=con();
	return $con->query("select * from users ORDER BY username");
}

// returns a user by username
function getUser($username)
{
	$con=con();
	$table=$con->query("select * from users WHERE username = '$username'");
	return $table->fetch_array();	
}


// description: authenticate user by username and password
function auth_user($username,$password)
{
	$con=con();
	$con->query("select * from users where username='$username' and 
	password='$password'");
	return $con->affected_rows==1;
}

?>