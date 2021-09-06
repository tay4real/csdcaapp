<?php

function deleteUser($user_id){
	$con=con();
	$con->query("DELETE FROM users WHERE id = '$user_id'");
}



?>