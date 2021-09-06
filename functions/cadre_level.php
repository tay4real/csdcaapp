<?php

// returns distinct cadres
function getAllCadres()
{
	$con=con();
	return $con->query("select DISTINCT (Cadre) from soscadres ORDER BY Cadre");
}

// returns distinct cadre levels
function getAllLevels()
{
	$con=con();
	return $con->query("select DISTINCT (GL) from soscadres ORDER BY id");
}

// returns Grade levels by Cadre
function getLevels($cadre)
{
	$con=con();
	$table=$con->query("select id,GL from soscadres WHERE Cadre = '$cadre'");
	return $table->fetch_array();	
}

// returns post by cadre and level
function getPost($cadre, $level)
{
	$con=con();
	$table=$con->query("select * from soscadres WHERE Cadre = '$cadre' AND GL = '$level'");
	return $table->fetch_array();	
}

?>