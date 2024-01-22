<?php

function check_fibonacci($a){
        echo $x=1," ";    //x is constant and "" is string so . thi concate naii thay so ,
        
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


?>