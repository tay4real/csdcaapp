<?php
	session_start();
 	error_reporting(0);
 	require_once './utility.php';

 	if(@validate($_GET[cs_no])){
		
	$filename =  strtoupper($_GET[cs_no]) . '.jpg';
	$filepath = '../saved_images/';

	$savedPicture = $filepath . $filename; 

	if($savedPicture)
	{
		unlink($savedPicture);	
	}
 
	move_uploaded_file($_FILES['webcam']['tmp_name'], $filepath.$filename);

	$_SESSION["photo"] = addslashes(file_get_contents($_FILES['webcam']['tmp_name']));

	echo $filepath.$filename;
 	}
?>



