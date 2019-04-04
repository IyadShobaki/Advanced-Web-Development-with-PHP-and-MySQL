<?php
include_once 'dbConfig.php';

$filename = "members_". date('Y-m-d') . ".csv";
$delimiter = ",";
$f = fopen('php://memory', 'w');

$fields = array('ID', 'Name', 'Email','Phone', 'Created', 'Status');
fputcsv($f, $fields, $delimiter);

$result = $db->query("select * from members order by id DESC");
if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        $lineData = array($row['id'], $row['name'], $row['email'], $row['phone'], $row['created'], $row['status']);
        fputcsv($f, $lineData, $delimiter);
        
    }
}
fseek($f, 0);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="'.$filename.'"');

fpassthru($f);
exit();
?>