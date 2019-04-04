<?php
$dbHost = "localhost";
$dbUserName = "root";
$dbPassword = "*****";
$dbName = "members";

$db = new mysqli($dbHost, $dbUserName, $dbPassword, $dbName);

if($db->connect_error){
    die("Connection failed: ". $db->connect_error);
}
?>