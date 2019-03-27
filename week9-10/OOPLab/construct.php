<?php

class CreateAndDestructClass{
    
    public function __construct(){
        echo '"' . __CLASS__ . '" was created!<br>';
    }
    
    public function __destruct(){
        echo '"' . __CLASS__ . '" was destroyed!<br>';
    }
}

$obj = new CreateAndDestructClass;

echo "End of the file!<br>";
?>