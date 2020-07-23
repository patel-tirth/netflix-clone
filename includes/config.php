<?php

ob_start();
session_start();

date_default_timezone_set("America/Chicago");

try{
    $con = new PDO("mysql:dbname=netlix;host=localhost","root","password");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}

catch(PDOException $e){
    exit("Connection failed: " . $e->getMessage());
}

?>