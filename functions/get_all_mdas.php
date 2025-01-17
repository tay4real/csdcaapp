<?php require_once('../db_connect.php'); ?>

<?php

/*
* Script: DataTables server-side script for PHP and MySQL
*/

/* Array of database columns which should be read and sent back to DataTables. Use a space where
* you want to insert a non-database field (for example a counter or static image)
*/
$aColumns = array( 'code', 'name', 'code' );

/* Indexed column (used for fast and accurate table cardinality) */
$sIndexColumn = "id";

/* DB table to use */
$sTable = "mda";


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* If you just want to use the basic configuration for DataTables with PHP server-side, there is
* no need to edit below this line
*/

/*
* Local functions
*/
function fatal_error ( $sErrorMessage = '' )
{
header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
die( $sErrorMessage );
}

/*
* MySQL connection
*/
$gaSql['link'] = mysqli_connect($dbSERVER, $dbUSER, $dbPASS, $dbNAME);
// check for db connection errors
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
exit();
}


/*
* Paging
*/
$sLimit = "";
if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
{
$sLimit = "LIMIT ".intval( $_GET['iDisplayStart'] ).", ".
intval( $_GET['iDisplayLength'] );
}


/*
* Ordering
*/
$sOrder = "";
if ( isset( $_GET['iSortCol_0'] ) )
{
$sOrder = "ORDER BY ";
for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
{
if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
{
$sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
".($_GET['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
}
}

$sOrder = substr_replace( $sOrder, "", -2 );
if ( $sOrder == "ORDER BY" )
{
$sOrder = "";
}
}


/*
* Filtering
* NOTE this does not match the built-in DataTables filtering which does it
* word by word on any field. It's possible to do here, but concerned about efficiency
* on very large tables, and MySQL's regex functionality is very limited
*/
$sWhere = "";
if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
{
$sWhere = "WHERE (";
for ( $i=0 ; $i<count($aColumns) ; $i++ )
{
if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" )
{
$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ";
}
}
$sWhere = substr_replace( $sWhere, "", -3 );
$sWhere .= ')';
}

/* Individual column filtering */
for ( $i=0 ; $i<count($aColumns) ; $i++ )
{
if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
{
if ( $sWhere == "" )
{
$sWhere = "WHERE ";
}
else
{
$sWhere .= " AND ";
}
$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string($_GET['sSearch_'.$i])."%' ";
}
}


/*
* SQL queries
* Get data to display
*/
$sQuery = "
SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
FROM $sTable
$sWhere
$sOrder
$sLimit
";
$rResult = mysqli_query($gaSql['link'] , $sQuery ) or fatal_error( 'MySQL Error: ' . mysqli_errno() );

/* Data set length after filtering */
$sQuery = "
SELECT FOUND_ROWS()
";
$rResultFilterTotal = mysqli_query( $gaSql['link'],$sQuery  ) or fatal_error( 'MySQL Error: ' . mysqli_errno() );
$aResultFilterTotal = mysqli_fetch_array($rResultFilterTotal);
$iFilteredTotal = $aResultFilterTotal[0];

/* Total data set length */
$sQuery = "
SELECT COUNT(".$sIndexColumn.")
FROM $sTable
";
$rResultTotal = mysqli_query($gaSql['link'], $sQuery ) or fatal_error( 'MySQL Error: ' . mysqli_errno() );
$aResultTotal = mysqli_fetch_array($rResultTotal);
$iTotal = $aResultTotal[0];


/*
* Output
*/

while ( $aRow = mysqli_fetch_array( $rResult ) )
{
    $row = array();
    for ( $i=0 ; $i<count($aColumns) ; $i++ )
    {
        if($aColumns[$i] == "code" && $i == 2){
            $row[] = '<a href = "mda_update.php?link='. $aRow[ $aColumns[$i] ]. '"><button type="button" name="update" id="'.$aRow[ $aColumns[$i] ].'" class="btn btn-warning btn-xs update mr-2">Update</button></a>
            <a href = "mda_list.php?link='. $aRow[ $aColumns[$i] ]. '"><button onclick="confirmDelete()" type="button" name="delete" id="'.$aRow[ $aColumns[$i] ].'" class="btn btn-danger btn-xs update">Delete</button></a>';
        }
        else if ( $aColumns[$i] != ' ' )
        {
            /* General output */
            $row[] = $aRow[ $aColumns[$i] ];
        }
  
       
    }
   
    $output['aaData'][] = $row;
}


echo json_encode( $output );
?>