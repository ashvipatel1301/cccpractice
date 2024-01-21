<?php
// Loops in PHP allow you to execute a block of code repeatedly.

#For loop

for($i=1;$i<=5;$i++){
    echo $i;
    echo "<br>";
}

#while loop
// The `while` loop is used when you don't know in advance how many times the loop should run, and it continues as long as a specified condition is true.
// as a specified condition is true.

// print numbers from 1 to 5 using while loop
$i=1;
while($i<=5){
    echo $i;
    echo "<br>";
    $i++;
}

#foreach loop
//The `foreach` loop is specifically designed for iterating over arrays.
//ex-iterate over an array and print each element 

$colors=array("red","green","blue","white");
foreach($colors as $color){
    echo $color;
    echo "<br>";
}





?>