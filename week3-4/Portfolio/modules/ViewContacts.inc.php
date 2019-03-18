

<?php

echo '<h1 id="feedback">Customers Feedback</h1>';
require('./includes/dbConnection.php');

// Number of records to show per page:
$display = 10;
// Determine how many pages there are...
if (isset($_GET['p']) && is_numeric($_GET['p'])) { // Already been determined.
	$pages = $_GET['p'];
} else { // Need to determine.
 	// Count the number of records:
	$q = "SELECT COUNT(id) FROM contacts";
	$r = @mysqli_query($conn, $q);
	$row = @mysqli_fetch_array($r, MYSQLI_NUM);
	$records = $row[0];
    
	// Calculate the number of pages...
	if ($records > $display) { // More than 1 page.
		$pages = ceil ($records/$display);
       
	} else {
		$pages = 1;
         
	}
   
} // End of p IF.
// Determine where in the database to start returning results...
if (isset($_GET['s']) && is_numeric($_GET['s'])) {
	$start = $_GET['s'];
} else {
	$start = 0;
}
// Determine the sort...
// Default is by registration date.
$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'cd';
// Determine the sorting order:
switch ($sort) {
	case 'ln':
		$order_by = 'last_name ASC';
		break;
	case 'fn':
		$order_by = 'first_name ASC';
		break;
	case 'cd':
		$order_by = 'contact_date ASC';
		break;
	default:
		$order_by = 'contact_date ASC';
		$sort = 'cd';
		break;

}
// Define the query:
 
$q = "SELECT last_name, first_name, message, DATE_FORMAT(contact_date, '%M %d, %Y') AS dc, id FROM contacts ORDER BY $order_by LIMIT $start, $display";
$r = @mysqli_query($conn, $q); // Run the query.
// Table header:
                echo '<br>';
     $q1 = "SELECT COUNT(id) FROM contacts";
	$r1 = @mysqli_query($conn, $q1);
    $row1 = @mysqli_fetch_array($r1, MYSQLI_NUM);
   $records = $row1[0];             
 echo '<p id="tr">Total reviews: '. $records . '</p>';          
echo '<table width="60%">
<thead>
<tr>
	
	<th align="left"><strong><a href="index.php?p=ViewContacts?sort=ln">Last Name</a></strong></th>
	<th align="left"><strong><a href="index.php?p=ViewContacts?sort=fn">First Name</a></strong></th>
    <th align="center"><strong>Message</strong></th>
	<th align="left"><strong><a href="index.php?p=ViewContacts?sort=cd">Date</a></strong></th>
</tr>
</thead>
<tbody>
';
// Fetch and print all the records....
$bg = '#eeeeee';
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
	$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<tr bgcolor="' . $bg . '">
		
		<td class="left">' . $row['last_name'] . '</td>
		<td class="left">' . $row['first_name'] . '</td>
        <td align="center">' . $row['message'] . '</td>
		<td align="center">' . $row['dc'] . '</td>
	</tr>
	';
} // End of WHILE loop.
echo '</tbody></table>';

mysqli_free_result($r);
mysqli_close($conn);
// Make the links to other pages, if necessary.
if ($pages > 1) {
	echo '<p class="next">';
	$current_page = ($start/$display) + 1;
	// If it's not the first page, make a Previous button:
	if ($current_page != 1) {
		echo '<a href="index.php?p=ViewContacts?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
	}
	// Make all the numbered pages:
	for ($i = 1; $i <= $pages; $i++) {
		if ($i != $current_page) {
			echo '<a href="index.php?p=ViewContacts?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a> ';
		} else {
			echo $i . ' ';
		}
	} // End of FOR loop.
	// If it's not the last page, make a Next button:
	if ($current_page != $pages) {
		echo '<a href="index.php?p=ViewContacts?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
	}
	echo '</p>'; // Close the paragraph.
} // End of links section.
                

?>

