<h2 id="save">Please feel free to contact me!</h2><br /><br /><form action="index.php?p=contact" method="post">
<table width="360" cellpadding="2" cellspacing="0">
	<tr>
		<td width="20%"><span id="rfvname">* First Name:</span></td>
		<td><input type="text" name="first name" placeholder="First Name.." value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></td>
	</tr>
    <tr>
		<td width="20%"><span id="rfvname">* Last Name:</span></td>
		<td><input type="text" name="last name" placeholder="Last Name.." value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></td>
	</tr>
	<tr>
		    <td ><span id="rfvemail">* Email:</span></td>
		   <td><input type="text" name="email" placeholder="Your Email.." value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" /></td>
	</tr>
	<tr>
		  <td >Comments:</td>
		   <td><textarea name="comments" rows="5" cols="15" placeholder="Comments.." value="<?php if (isset($_POST['comments'])) echo $_POST['comments']; ?>"></textarea></td>
	</tr>
	<tr>
		   <td>&nbsp;</td>
		   <td><input type="submit" value="Submit" id="btnSubmit" name="submit" /></td>
            
	</tr>
	<tr>
		   
        <td colspan="3"><p><em>Please click one time on submit button and wait 5-10 seconds. Thank you!</em></p></td>
	</tr>	
	
</table>
</form>
<br>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
//   require_once(DB); // DB path defined in config.inc.php 
	require('includes/dbConnection.php'); // Connect to the db.
	$errors = []; // Initialize an error array.
	$email = $_POST['email'];
	// Check for a first name:
	if (empty($_POST['first_name'])) 
	{
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = mysqli_real_escape_string($conn, trim($_POST['first_name']));
	}
	
	// Check for a last name:
	if (empty($_POST['last_name'])) 
	{
		$errors[] = 'You forgot to enter your last name.';
	} else 
	{
		$ln = mysqli_real_escape_string($conn, trim($_POST['last_name']));
	}
	
	// Check for an email address:
	if (empty($_POST['email'])) 
	{
		$errors[] = 'You forgot to enter your email address.';
	} elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $e = mysqli_real_escape_string($conn, trim($_POST['email']));
    } else {
       $errors[] = "This email is not a valid email address";
    }
	if (empty($_POST['comments'])) 
	{
		$errors[] = 'You forgot to write a message.';
	} else 
	{
		$cmt = mysqli_real_escape_string($conn, trim($_POST['comments']));
	}
	
	if (empty($errors)) 
		
	{ 
       
        
        // If everything's OK.
		// Register the user in the database...
		
		// Make the query:
		$q = "INSERT INTO contacts (first_name, last_name, email, message) VALUES ('$fn', '$ln', '$e', '$cmt')";
		$r = @mysqli_query($conn, $q); // Run the query.
		if ($r) 
			
		{ // If it ran OK.
			// Print a message:
            
            echo '<div id="save">';
			echo '<h1>Thank you, <strong>' . $fn . '</strong> !</h1><br>
		<p>Your information saved successfully!</p>';
       
        $to = "aol@example.com";
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $subject = "Form submission";
        $subject2 = "Copy of your form submission";
        $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['comments'];
//        $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['comments'];
        $message2 = '
        <html>
        <head>
        <title>Copy of your form submission</title>
        </head>
        <body>
        <h1>Hello<strong>' . $first_name . '!</strong></h1><br>
        <h3Here is a copy of your message</h3><br>
        <p>'. $_POST['comments'] .'</p>
        
        </body>
        <footer>
        <a href ="index.php">Iyad Portfolio</a>
        </footer>
        </html>
        ';
        $headers = "From:" . $email;
        $headers2[] = "From: aol@example1.com";
        $headers2[] = 'MIME-Version: 1.0';
        $headers2[] = 'Content-type: text/html; charset=iso-8859-1';
        mail($to,$subject,$message,$headers);
      mail($email,$subject2,$message2,implode("\r\n", $headers2)); 
        echo '<p>Mail Sent. Thank you! ' . $first_name . ', we will contact you shortly.</p>';
         echo '</div>';
    
		} else 
		
		{ // If it did not run OK.
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
			
			// Debugging message:
			echo '<p>' . mysqli_error($conn) . '<br><br>Query: ' . $q . '</p>';
		} 
		
		// End of if ($r) IF.
		
		mysqli_close($conn); // Close the database connection.
		
		// Include the footer and quit the script:
		
		exit();
	} else 
		
	{ 
	// Report the errors.
		echo '<div class="error"><h3><em>Error!</em></h3>
		<br>The following error(s) occurred:<br><p>';
		foreach ($errors as $cmt) 
		{ 
		
		// Print each error.
			echo " - $cmt<br>\n";
		}
		echo '</p><br><h3><em>Please try again.</em></h3></div>';
	} 
	
	// End of if (empty($errors)) IF.
	mysqli_close($conn); // Close the database  connection.
}
?>