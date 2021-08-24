<?php
require_once  __DIR__. "/vendor/autoload.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createUnsafeImmutable(__DIR__);
 $dotenv->load();

$DB_PASS = getenv("DB_PASSWORD");
$DB_USER = getenv("DB_USER");
$DB_NAME = getenv("DB_NAME");
$DB_SERVER = getenv("DB_SERVER");


