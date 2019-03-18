<?php
session_start();
if(isset($_GET['id'])){
    foreach($_SESSION['cart'] as $keys => $values){
       if($values['product_id'] == $_GET['id']){
           unset($_SESSION['cart'][$keys]);
           echo "<script>alert('Product Remove')</script>";
           echo "<script>window.location = 'index.php'</script>";
       } 
    }
}
?>
