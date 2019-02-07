<?php
$conn = mysqli_connect("localhost", "root", "*******", "Tulip");
if(!$conn){
    echo "Connection Error! " . mysqli_connect_error();
}
?>