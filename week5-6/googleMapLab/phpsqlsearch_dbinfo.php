<?php
$username="root";
$password="******";
$database="******";
$connection = mysqli_connect("localhost", $username, $password, $database);
if(!$connection){
    echo "Connection Error! " . mysqli_error($conn);
}
?>