<?php
$higherpercent=10;
$b=50;

$a=$b+($higherpercent/100)*$b;
// echo $a;
// $b=$a-($lowerpercent/100)*$a;
$lowerpercent=(1-($b/$a))*100;
// $lowerpercent=100*(1-($b/$a));
// echo round($lowerpercent,2);

echo " if a is 10% higher then b then b is ", round($lowerpercent,2)  ,"less then a";







?>