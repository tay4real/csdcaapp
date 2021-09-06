<?php

// returns all banks
function getAllBanks()
{
	$con=con();
	return $con->query("select * from banks ORDER BY id");
}
?>