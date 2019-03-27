<?php
class Fibonacci{
    public $number1;
    public $number2;
    
    public function getResult(){
        $num = 0;
        while ($num < 10){
            $n3 = $this->number1 + $this->number2;
            echo $n3.'<br>';
            $this->number1 = $this->number2;
            $this->number2 = $n3;
            $num++;
            
            
        }
        
    }
}

?>

<?php  
//$num = 0;  
//$n1 = 0;  
//$n2 = 1;  
//echo "<h3>Fibonacci series for first 12 numbers: </h3>";  
//echo "\n";  
//echo $n1.' '.$n2.' ';  
//while ($num < 10 )  
//{  
//    $n3 = $n2 + $n1;  
//    echo $n3.' ';  
//    $n1 = $n2;  
//    $n2 = $n3;  
//    $num = $num + 1;  
?>  

<?php  
///* Print fiboancci series upto 12 elements. */  
//$num = 12;  
//echo "<h3>Fibonacci series using recursive function:</h3>";  
//echo "\n";  
///* Recursive function for fibonacci series. */  
//function series($num){  
//    if($num == 0){  
//    return 0;  
//    }else if( $num == 1){  
//return 1;  
//}  else {  
//return (series($num-1) + series($num-2));  
//}   
//}  
///* Call Function. */  
//for ($i = 0; $i < $num; $i++){  
//echo series($i);  
//echo "\n";  
//} 
?>