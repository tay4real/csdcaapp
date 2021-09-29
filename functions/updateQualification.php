<?php

require_once('../db_connect.php'); 
require_once ('utility.php');

function updateQualification($category, $qual, $cs_no)
{
	$con=con();

			
	return $con->query("UPDATE staff_updated SET $category  ='$qual' WHERE cs_no = '$cs_no'");
	
			
}

if (isset($_POST['update_qual'])) {
    $cs_no = $_POST['csn'];
    $category = $_POST['qual_category'];
    $qual = $_POST['qual_info'];

    
    $updated = updateQualification($category, $qual, $cs_no);

    if($updated){
        $updated_object = (object) ["cs_no" => $cs_no, "category" => $category, "qual" => $qual
    ];
        // encoding array to json format
        echo json_encode($updated_object);
    }

}


?>