<?php
require "Rectangle.php";
class Square extends Rectangle{  
    public function isSquare(){
        if($this->length == $this->width){
            return true;
        }else{
            return false;
        }
    }
}
$obj = new Square;
$obj1 = new Square;
$obj2 = new Square;

$obj->length = 20;
$obj->width = 20;
$obj1->length = 30;
$obj1->width = 30;
$obj2->length = 20;
$obj2->width = 40;

if ($obj->isSquare()){
    echo "The area of the square is ";
}else{
    echo "The area of the rectangle is ";
};
echo $obj->getArea() . '<br>';

if ($obj1->isSquare()){
    echo "The area of the square is ";
}else{
    echo "The area of the rectangle is ";
};
echo $obj1->getArea(). '<br>';

if ($obj2->isSquare()){
    echo "The area of the square is ";
}else{
    echo "The area of the rectangle is ";
};
echo $obj2->getArea();
?>