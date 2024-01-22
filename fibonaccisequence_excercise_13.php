<?php

function check_fibonacci($a){
        echo $x=0," ";    //x is constant and "" is string so . thi concate naii thay so ,
        
        echo $y=1," ";
       
        for($i=3;$i<=$a;$i++){
        
            $z=$x+$y;
            echo $z." ";       //z is string and space ma kai nthi so ae string j kevay so . thi concate karay
            // echo ",";
            $x=$y;
            $y=$z;
            
        }





}

echo check_fibonacci(10)


///with recursion

// function fibo($num){
//       if($num<=1){
//         return $num;
//       }else{
    
//       return fibo($num-1)+fibo($num-2);
      
//       }
//     }      
// // echo fibo(5);
// for($i=0;$i<10;$i++){
//     echo fibo($i)." ";
// }




?>