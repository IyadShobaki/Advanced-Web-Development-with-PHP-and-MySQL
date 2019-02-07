<?php
$message = "The mail message was sent with the following mail";
$headers ="From: ishobaki0815@starkstate.net" ;
mail("iyadshobaki@yahoo.com", "Testing", $message, $headers);

echo "Test message is sent to iyadshobaki@yahoo.com ...<br/>";
?>