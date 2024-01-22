<?php

function primecheck($num){
   for($i=2;$i<$num;$i++){

       if($num%$i==0){
        echo "number is not prime number";
        break;
       }else{
        echo "number is prime number";

       }

     break;


   }


}
echo primecheck(10)


?>