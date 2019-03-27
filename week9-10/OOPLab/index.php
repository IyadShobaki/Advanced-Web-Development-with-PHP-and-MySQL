<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Fibonacci Example</title>
</head>

<body>
    <h1>Fibonacci Example</h1>
 <form action="index.php" method="POST">
        <p>Please enter first number:<br>
        <input type="text" name="Num1" value="<?php if (isset($_POST['Num1'])) echo $_POST['Num1']; ?>"></p>
     <p>Please enter second number:<br>
        <input type="text" name="Num2" value="<?php if (isset($_POST['Num2'])) echo $_POST['Num2']; ?>"></p>
        <p><input type="submit" name="submit" value="GO!"></p>
        </form>
</body>
</html>

<?php  
require "Fibonacci.php";
$obj = new Fibonacci;

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){ if(isset($_POST['Num1'],$_POST['Num2']) && is_numeric($_POST['Num1'])&&
is_numeric($_POST['Num2'])){
    $Num1 = $_POST['Num1'];
    $Num2 = $_POST['Num2'];
    if ($Num1 > 0 && $Num2 > 0 && $Num1 < $Num2){
    $obj->number1 = $Num1;
    $obj->number2 = $Num2;
    
    echo '<div class=result>'; 
    echo '<h3>The result of your request is shown below.</h3><br>';
    $obj->getResult();
    echo '</div>';
    }else{
        echo '<div class=result>';
        echo "Please enter postitive numbers and/or be sure that first number smaller than second number!";
       echo '</div>';
    }
    
        
    } elseif (($_POST['Num1'] = " ") &&($_POST['Num2'] = " ") && !is_numeric($_POST)['Num1'] && !is_numeric($_POST)['Num2']){
        echo '<div class=result>';
     echo "Please enter numbers!";
      echo '</div>';      
 }  
                                           
}


   
?>