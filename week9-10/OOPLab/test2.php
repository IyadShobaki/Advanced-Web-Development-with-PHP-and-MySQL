<?php

require "Rectangle.php";

$obj1 = new Rectangle;
$obj2 = new Rectangle;

echo $obj1->getArea();
echo "<br>";
echo $obj2->getArea();
echo "<br>";
$obj1->length = 30;
$obj1->width = 20;

$obj2->length = 35;
$obj2->width = 50;

echo $obj1->getArea();
echo "<br>";
echo $obj2->getArea();

?>