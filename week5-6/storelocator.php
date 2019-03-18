<?php
$username="root";
$password="aqk4xmhgDktuVqdt";
$database="googlemap";
$conn = mysqli_connect("localhost", $username, $password, $database);
if(!$conn){
    echo "Connection Error! " . mysqli_error($conn);
}else{

$center_lat = (isset($_GET["lat"]) ? $_GET["lat"] : -33);
$center_lng = (isset($_GET["lng"])? $_GET["lng"] : 151 );
$radius = ( isset( $_GET["radius"] ) ? $_GET["radius"] : 100 );
// Start XML file, create parent node
$dom = new DOMDocument("1.0","UTF-8");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);
$query = sprintf("SELECT id, name, address, lat, lng, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM markers HAVING distance < '%s' ORDER BY distance LIMIT 0 , 20",
  mysqli_real_escape_string($conn,$center_lat),
  mysqli_real_escape_string($conn,$center_lng),
  mysqli_real_escape_string($conn,$center_lat),
  mysqli_real_escape_string($conn,$radius));
$result = mysqli_query( $conn,$query);
if (!$result) {
  die("Invalid query: " . mysqli_error($conn));
}
header("Content-type: text/xml");
while ($row = @mysqli_fetch_assoc($result)){
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $node->setAttribute("id", $row['id']);
  $node->setAttribute("name", $row['name']);
  $node->setAttribute("address", $row['address']);
  $node->setAttribute("lat", $row['lat']);
  $node->setAttribute("lng", $row['lng']);
//  $node->setAttribute("distance", $row['distance']); 
}
    $dom->FormatOutput = true;
//$string_value =  $dom->saveXML();
//$dom->save("storelocator.xml");
    echo $dom->saveXML();
}
?>
