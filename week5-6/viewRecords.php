<?php 
$page_title = 'View Records';
//echo '<h1>Records</h1>';
require('phpsqlsearch_dbinfo.php');

$sql = "Select id, name, address, lat, lng FROM markers";

$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
        echo "Name: " . $row["name"]. " ". "<br>". "Address: " . $row["address"]. "<br><br>";
        
    }
}else{
    echo "No results found";
}


























//// Number of records to show per page:
//$display = 10;
//// Determine how many pages there are...
//if (isset($_GET['p']) && is_numeric($_GET['p'])) { // Already been determined.
//	$pages = $_GET['p'];
//} else { // Need to determine.
// 	// Count the number of records:
//	$q = "SELECT COUNT(id) FROM markers";
//	$r = @mysqli_query($connection, $q);
//	$row = @mysqli_fetch_array($r, MYSQLI_NUM);
//	$records = $row[0];
//	// Calculate the number of pages...
//	if ($records > $display) { // More than 1 page.
//		$pages = ceil ($records/$display);
//	} else {
//		$pages = 1;
//	}
//} // End of p IF.
//// Determine where in the database to start returning results...
//if (isset($_GET['s']) && is_numeric($_GET['s'])) {
//	$start = $_GET['s'];
//} else {
//	$start = 0;
//}
//// Determine the sort...
//// Default is by name
//$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'name';
//// Determine the sorting order:
//switch ($sort) {
//	case 'name':
//		$order_by = 'name ASC';
//		break;
//	case 'lat':
//		$order_by = 'lat ASC';
//		break;
//	default:
//		$order_by = 'name ASC';
//		$sort = 'name';
//		break;
//}
//// Define the query:
//$q = "SELECT id, name, address, lat, lng FROM markers ORDER BY $order_by LIMIT $start, $display";
//$r = @mysqli_query($connection, $q); // Run the query.
//// Table header:
//echo '<table width="60%">
//<thead>
//<tr>
//	<th align="left"><strong>Edit</strong></th>
//	<th align="left"><strong>Delete</strong></th>
//	<th align="left"><strong><a href="viewRecords.php?sort=name">Name</a></strong></th>
//	<th align="left"><strong><a href="viewRecords.php?sort=address">Address</a></strong></th>
//	<th align="left"><strong><a href="viewRecords.php?sort=lat">Lat</a></strong></th>
//	<th align="left"><strong><a href="viewRecords.php?sort=lng">Lng</a></strong></th>
//</tr>
//</thead>
//<tbody>
//';
//// Fetch and print all the records....
//$bg = '#eeeeee';
//while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
//	$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
//		echo '<tr bgcolor="' . $bg . '">
//		<td align="left"><a href="#edit_user.php?id=' . $row['id'] . '">Edit</a></td>
//		<td align="left"><a href="#delete_user.php?id=' . $row['id'] . '">Delete</a></td>
//		<td align="left">' . $row['name'] . '</td>
//		<td align="left">' . $row['address'] . '</td>
//		<td align="left">' . $row['lat'] . '</td>
//		<td align="left">' . $row['lng'] . '</td>
//	</tr>
//	';
//} // End of WHILE loop.
//echo '</tbody></table>';
//mysqli_free_result($r);
//mysqli_close($connection);
//// Make the links to other pages, if necessary.
//if ($pages > 1) {
//	echo '<br><p>';
//	$current_page = ($start/$display) + 1;
//	// If it's not the first page, make a Previous button:
//	if ($current_page != 1) {
//		echo '<a href="viewRecords.php?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
//	}
//	// Make all the numbered pages:
//	for ($i = 1; $i <= $pages; $i++) {
//		if ($i != $current_page) {
//			echo '<a href="viewRecords.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a> ';
//		} else {
//			echo $i . ' ';
//		}
//	} // End of FOR loop.
//	// If it's not the last page, make a Next button:
//	if ($current_page != $pages) {
//		echo '<a href="viewRecords.php?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
//	}
//	echo '</p>'; // Close the paragraph.
//} // End of links section.
?>