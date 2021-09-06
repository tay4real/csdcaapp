<?php
require_once  __DIR__. "/vendor/autoload.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createUnsafeImmutable(__DIR__);
 $dotenv->load();

$dbSERVER = getenv("DB_SERVER");
$dbUSER = getenv("DB_USER");
$dbPASS = getenv("DB_PASSWORD");
$dbNAME = getenv("DB_NAME");

function con(){
    return new mysqli($GLOBALS['dbSERVER'],$GLOBALS['dbUSER'],$GLOBALS['dbPASS'],$GLOBALS['dbNAME']);
}