<?php
// on output buffering 
ob_clean() ;
session_start() ;
date_default_timezone_set("Indian/Comoro");

// connect to database
try {
    $con = new PDO("mysql:dbname=notflix;host=localhost","root","");
    // PDO is php data object 
    // create connection to the database 
    $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_WARNING);
    // SETING ATTRIBUTE ERROR MODE AND ERROR WARNING
}
catch(PDOExceptioon $e) {
    exit("Connection Failed : " . $e->getMessage());
}
?>