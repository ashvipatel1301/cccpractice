<?php

$arrayToSort = [64, 34, 25, 12, 22, 11, 90];
$x=count($arrayToSort);


for($i=0;$i<$x;$i++){    //for the pass 
    for($j=0;$j<$x-1;$j++){
        if($arrayToSort[$j]>$arrayToSort[$j+1]){
                
            $temp=$arrayToSort[$j];
            $arrayToSort[$j]=$arrayToSort[$j+1];
            $arrayToSort[$j+1]=$temp;
        }
      
    }
    
  
}
print_r($arrayToSort);


?>