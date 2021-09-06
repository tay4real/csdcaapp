<?php
//description: validate a variable
function validate($var)
{
	return isset($var)&&!empty($var);
}

//description: redirect to url
function redirect($url)
{
	header("location:$url");
}

// description: -- verify phone format
function verifyPhone($phoneno){
	if(isNumber($phoneno) && strlen($phoneno)== 11){
		return true;
	}
}

// description: -- check if number
function isNumber($num){
	if(ctype_digit($num)){
		return (int)$num;
	}
}

// description: checks if username exist in the database
function isUser($username)
{
    $con=con();
	$con->query("select * from users where username='$username'");
	return $con->affected_rows==1;
}
?>