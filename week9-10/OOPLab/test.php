<?php

require "Rectangle.php";

$obj = new Rectangle;

echo $obj->length;
echo "<br>";
echo $obj->width;
echo "<br>";
$obj->length = 30;
$obj->width = 20;

echo $obj->length;
echo "<br>";
echo $obj->width;
echo "<br>";
echo $obj->getPerimeter();
echo "<br>";
echo $obj->getArea();
?>