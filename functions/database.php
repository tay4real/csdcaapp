<?php

// description: query database
function totalRowsAffected($sql)
{
	$con=con();
	$con->query($sql);
	return $con->affected_rows;
}





?>