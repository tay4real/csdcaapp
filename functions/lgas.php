<?php
function getAllLGA()
{
	$con=con();
	return $con->query("select * from lga ORDER BY id");
}



?>