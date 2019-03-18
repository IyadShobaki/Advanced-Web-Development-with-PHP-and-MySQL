<?php
session_start();
if(isset($_POST['add'])){
    if(isset($_SESSION['cart'])){
        $product_array_id = array_column($_SESSION["cart"],"item_id");
        if(!in_array($_GET['id'], $product_array_id)){
            $count = count($_SESSION['cart']);
            $product_array = array('product_id' => $_GET['id'], 'product_name' => $_POST['product_name'], 'product_price' => $_POST['product_price'],'qty' => $_POST['qty']);
            $_SESSION['cart'][$count] = $product_array; 
            echo "<script>window.location = 'index.php'</script>";
            
        }else{
            echo "<script>window.location = 'index.php'</script>";
        }
    }else{
        $product_array = array(
        'product_id' => $_GET['id'],
        'product_name' => $_POST['product_name'],
        'product_price' => $_POST['product_price'],
        'qty' => $_POST['qty']);
        $_SESSION['cart'][0] = $product_array;
        echo "<script>window.location = 'index.php'</script>";
    }
}
?>