<?php
$n=10;
for($i=1;$i<=$n/2;$i++){
    for($j=1;$j<=$n;$j++){

        if($i + $j >= $n+2 || $j <= $i-1){

        echo "&nbsp"." ";
        echo "&nbsp";

        }else{
            echo $j." ";
        }

    }
    echo "<br>";
}
// for($i=$n/2+1;$i<=$n;$i++){
//     for($j=&n;$j>=1;$j--){
//         if($i + $j >= $n+2 || $j <= $i-1){

//             echo "&nbsp";
//             echo "&nbsp";
    
//             }else{
//                 echo $j." ";
//             }
    
//         }
//         echo "<br>";

//     }





?>