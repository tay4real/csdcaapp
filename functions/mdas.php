<?php

// return all MDAs
function getAllMDA()
{
	$con=con();
	return $con->query("select * from mda ORDER BY name");
}

// returns MDA with code specifiied
function getMDA($code)
{
	$con=con();
	$table=$con->query("select * from mda WHERE code = '$code'");
	return $table->fetch_array();	
}


?>

