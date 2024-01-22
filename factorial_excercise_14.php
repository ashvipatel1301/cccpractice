<?php

function check_fact($num){

    if($num==0 || $num==1){
        return 1;
    }else{

    $fact=$num*check_fact($num-1);
    return $fact;
    }



}

echo check_fact(6)


?>