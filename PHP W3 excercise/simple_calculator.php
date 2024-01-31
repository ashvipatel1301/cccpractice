<?php

class calculator{
    public function add($num1,$num2){
        return $num1+$num2;

    }
    public function substract($num1,$num2){
        return $num1-$num2;

    }
    public function multiply($num1,$num2){
        return $num1*$num2;

    }
    public function divide($num1,$num2){
        if($num2!=0){
             return $num1/$num2;
        }else{
             echo "Can not divide by zero!";
        }

    }
}

$calculator = new calculator();
echo $calculator->divide(10,15);
// print_r($calculator);    nothing will be printed  calculator object()



?>



