<?php
$message = "The mail message was sent with the following mail";
$headers ="From: example@gmail.com" ;
mail("example@gmail.com", "Testing", $message, $headers);

echo "Test message is sent to example@gmail.com ...<br/>";
?>