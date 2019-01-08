<!DOCTYPE html>
<html lang="en">
    <!--Iyad Shobaki
    SPRING 2019 Advanced Web Development with PHP and MySQL
    Professor  Jessica Aubley
    Tip Calculator Lab
    1/8/2019 -->
<head>
<title>Tip Calculator</title>
<meta charset="utf-8"> 
<link href="css/style.css" rel="stylesheet">
</head>
<body>
    <h2>This calculator will help you determine the tip for your bill.</h2>
 <form method="GET">
  What is the amount of your bill including tax?
     <br>
  <input type="text" name="bill" placeholder="bill..">
     <br>
     <br>
     What is the percentage of tip you would like to leave?
     <br>
  <input type="text" name="tip" placeholder="tip..">
    <br>
     <br>
    <button type="submit" name="submit" value="submit">Calculate</button>
    

    
<?php
    if (isset ($_GET['submit']))
    {
        $bill = $_GET['bill'];
        $tip = $_GET['tip'];
        $total = $bill * ($tip / 100);
        $sum = $bill + $total;
        
    echo '<p>
        Your tip should be: $'
     . number_format($total, 2); echo '</p>' ;
      
    echo '<p>Your final bill including the tip is: $'  . number_format($sum, 2); echo '</p>';
    }
?>
     </form>
</body>
</html>