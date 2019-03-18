<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="URF-8" name="viewport" content="width=device-width, initial scale=1"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
</head>   
<body>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
    <a class="navbar-brand" href="https://sourcecodester.com">Sourcecodester</a>    
    </div>
    </nav>
    <div class="col-md-7 well">
    <h3 class="text-primary">PHP - Simple Shopping Cart</h3>
    <hr style="border-top:1px dotted #ccc;"/>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Add Product</button>
    <br/><br/>  
    <?php
        require 'database/conn.php';
        $query = $conn->query("select * from `product` order by `product_price` desc");
        while($fetch = $query->fetch_array()){    
    ?>
    <div class="pull-left" style="height:350px; width:220px; margin:8px; border:1px solid #000; padding:5px; border-radius:50px;">
    <center><img src="<?php echo $fetch['image']?>" height="150px" Width="180px"/></center>
    <center><h4><strong><?php echo $fetch['product_name']?></strong></h4></center>
        <center><h4 class="text-danger">&#36;<?php echo number_format($fetch['product_price'])?></h4></center>
    <form method="post" action="addcart.php?id=<?php echo $fetch['product_id']?>"> 
        <input type="hidden" name="product_name" value="<?php echo $fetch['product_name']?>"/>
        <input type="hidden" name="product_price" value="<?php echo $fetch['product_price']?>"/>
        <center><input type="number" name="qty"/></center>
        <br />
        <center><button class="btn btn-success" name="add"><span class="glyphicon glyphicon-shopping-cart"></span>Add to cart</button></center>
        </form>  
        </div>
    <?php
        }
        ?>
    </div>
   <div class="col-md-5">
    <div class="alert alert-info">
    <h2>Orders</h2>
       </div>
       <table class="table table-bordered">
       <thead>
        <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Total</th>
        <th>Action</th>   
        </tr>   
      </thead>
        <tbody>
          <?php
        
            if(!empty($_SESSION["cart"])){
                $total = 0;
            foreach ($_SESSION['cart'] as $keys => $values){    
            
            ?>
            <tr>
            <td><?php echo $values['product_name']?></td>
            <td>&#36; <?php echo number_format($values['product_price'])?></td> 
            <td><?php echo $values['qty']?></td>
            <td>&#36; <?php echo number_format($values['qty'] * $values['product_price'])?></td>
                <td><center><a class="btn btn-danger" href="delete.php?id=<?php echo $values['product_id']?>"><span class="glyphicon glyphicon-remove"></span></a></center></td>   
            </tr>
            <?php
            $total = $total + ($values['qty'] * $values['product_price']);                }
            ?>
            <tr>
            <td colspan="3" align="right">Total</td>
            <td>&#36; <?php echo number_format($total) ?></td>
            <td><a href="purchase.php" class="btn btn-info"><span class="glyphicon glyphicon-ok"></span>Buy</a></td>    
            </tr>
            <?php
            }
            ?>
        </tbody>
       </table>
    </div>
    <div class="modal fade" id="form_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <form action="save_query.php" method="post" enctype="multipart/form-data">
    <div class="modal-content">
    <div class="modal-body">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <div class="form-group">
    <label>Product Name</label>
     <input class="form-control" type="text" name="product_name">   
    </div>  
    <div class="form-group">
    <label>Product Price</label>
    <input class="form-control" type="number" name="product_price">    
    </div>    
    <div class="form-group">
    <label>Product Photo</label>
    <input class="form-control" type="file" name="product_image">    
    </div>    
    </div>    
    </div> 
    <div style="clear:both;"></div>
    <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Close</button>
    <button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span>Save</button>    
    </div>    
    </div>    
    </form>    
    </div>    
    </div>
</body> 
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
</html>
