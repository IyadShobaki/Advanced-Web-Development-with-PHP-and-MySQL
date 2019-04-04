<!--Iyad Shobaki
    SPRING 2019 Advanced Web Development with PHP and MySQL
    Professor  Jessica Aubley
    CSV files
    4/3/2019 -->
<?php
include_once 'dbConfig.php';
if(!empty($_GET['status']))
{
    switch($_GET['status'])
    {
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Members data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
             $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
             $statusType = '';
            $statusMsg = '';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CSV Tutorial</title>
    
    <!-- Bootstrap library -->
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    
    <!-- Stylesheet file -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <h2>Members List</h2>
    
    <!-- Display status message -->
    <?php
    if (!empty($statusMsg)){ ?>
    <div class="col-xs-12">
        <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?>
        </div>
    </div>
    <?php
    }
    ?>
    
    <div class="row">
        <!-- Import & Export link -->
        <div class="col-md-12 head">
            <div class="float-right">
                <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i> Import</a>
                <a href="exportData.php" class="btn btn-primary"><i class="exp"></i> Export</a>
            </div>
        </div>
        <!-- CSV file upload form -->
        <div class="col-md-12" id="importFrm" style="display: none;">
            <form action="importData.php" method="post" enctype="multipart/form-data">
                <input type="file" name="file" />
                <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
            </form>
        </div>
    
        <!-- Data list table --> 
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>#ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
			 <!-- We will use the php tag set below to add the table information to our coding --> 
            <?php
            // Get member rows
            $result = $db->query("select * from members order by id DESC");
            if($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc()){
            
            ?>
                <tr>
                     <td><?php echo $row['id']; ?></td>
                     <td><?php echo $row['name']; ?></td>
                     <td><?php echo $row['email']; ?></td>
                     <td><?php echo $row['phone']; ?></td>
                     <td><?php echo $row['status']; ?></td>
                </tr>
                
            <?php } }else{ ?>
                <tr><td colspan="5">No member(s) found...</td></tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Show/hide CSV upload form -->
<script>
function formToggle(ID){
    var element = document.getElementById(ID);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}
</script>
</body>
</html>