<?php # Script 2.7 - view_tasks.php

// Connect to the database:
$dbc = @mysqli_connect ('localhost', 'username', 'password', 'test') OR die ('<p>Could not connect to the database!</p></body></html>');

// Get the latest dates as timestamps:
$q = 'SELECT UNIX_TIMESTAMP(MAX(date_added)), UNIX_TIMESTAMP(MAX(date_completed)) FROM tasks'; 
$r = mysqli_query($dbc, $q);
list($max_a, $max_c) = mysqli_fetch_array($r, MYSQLI_NUM);

// Determine the greater timestamp:
$max = ($max_a > $max_c) ? $max_a : $max_c;

// Create a cache interval in seconds:
$interval = 60 * 60 * 6; // 6 hours

// Send the header:
header ("Last-Modified: " . gmdate ('r', $max));
header ("Expires: " . gmdate ("r", ($max + $interval)));
header ("Cache-Control: max-age=$interval");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<title>View Tasks</title>
</head>
<body>
<h3>Current To-Do List</h3>
<?php

/*	This page shows all existing tasks.
 *	A recursive function is used to show the 
 *	tasks as nested lists, as applicable.
 */

// Function for displaying a list.
// Receives one argument: an array.
function make_list ($parent) {

	// Need the main $tasks array:
	global $tasks;

	// Start an ordered list:
	echo '<ol>';
	
	// Loop through each subarray:
	foreach ($parent as $task_id => $todo) {
		
		// Display the item:
		echo "<li>$todo";
			
		// Check for subtasks:
		if (isset($tasks[$task_id])) { 
			
			// Call this function:
			make_list($tasks[$task_id]);
			
		}
			
		// Complete the list item:
		echo '</li>';
	
	} // End of FOREACH loop.
	
	// Close the ordered list:
	echo '</ol>';

} // End of make_list() function.

// Retrieve all the uncompleted tasks:
$q = 'SELECT task_id, parent_id, task FROM tasks WHERE date_completed="0000-00-00 00:00:00" ORDER BY parent_id, date_added ASC'; 
$r = mysqli_query($dbc, $q);

// Initialize the storage array:
$tasks = array();

while (list($task_id, $parent_id, $task) = mysqli_fetch_array($r, MYSQLI_NUM)) {

	// Add to the array:
	$tasks[$parent_id][$task_id] =  $task;

}

// For debugging:
//echo '<pre>' . print_r($tasks,1) . '</pre>';

// Send the first array element
// to the make_list() function:
make_list($tasks[0]);

?>
</body>
</html>
