<!--Iyad Shobaki
    SPRING 2019 Advanced Web Development with PHP and MySQL
    Professor  Jessica Aubley
    Upload files
    4/3/2019 -->
<!DOCTYPE html>
<html lang="en">
	<header>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>PHP Upload File Images Tutorial</title>
		
		<!-- Bootstrap coding has been provided, do NOT remove any of the coding you see here!! -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</header>
	<body>
		<div class="container">			
			<div class="page-header">
				<h1>Tutorial on Uploading Files <small>Advanced PHP</small> </h1>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<!-- You will add a form in this area using our tutorial!! -->
                    <form method="POST" enctype="multipart/form-data" name="formUploadFile" id="uploadForm" action="upload.php">
                    <div class="form-group">
                     <label for="exampleInputFile">Select files to upload:</label>
                    
                    <input type="file" id="exampleInputFile" name="files[]" multiple="multiple">
                    <p class="help-block"><span class="label label-info">Note:</span>Please select the only images(.jpg, .jpeg, .png, .gif) to upload with the size of 100KB only.</p>  
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnSubmit">Start Upload</button>
                    <a href="view.php" class="btn btn-info">Show Upload Files</a>    
                    </form>
					
				</div>
			</div>
		</div>
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jQuery.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		
		<script src="js/jQuery.Form.js"></script>
		
		<script type="text/javascript">
			$(document).ready(function(){			
				
				var divProgressBar=$("#divProgressBar");
				var status=$("#status");
				
				$("#uploadForm").ajaxForm({
					
					dataType:"json",
					
					beforeSend:function(){
						divProgressBar.css({});
						divProgressBar.width(0);
					},
					
					uploadProgress:function(event, position, total, percentComplete){
						var pVel=percentComplete+"%";
						divProgressBar.width(pVel);
					},
					
					complete:function(data){
						status.html(data.responseText);
					}
				});
			});
		</script>
	</body>
</html>