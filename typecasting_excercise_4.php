<?php
     

//any datatypeTo--->String = cast to string, use the (string) statement
$a=5;
$str="Hello";

$a=(string)$a;
var_dump($a);
echo "<br>";

$str=(string)$str;
var_dump($str);

//any datatypeTo--->integer = To cast to integer, use the (int) statement
// $str=" 13 Hello";
// $f=15.14;

// $str=(int)$str;
// var_dump($str);
// echo "<br>";
// $f=(int)$f;
// var_dump($f);


//any datatypeTo--->float  = To cast to float, use the (float) statement
// $x=20;
// $str="60 Hello";

// $x=(float)$x;
// var_dump($x);
// echo "<br>";

// $str=(float)$str;
// var_dump($str);
//Note that when casting a string that starts with a number, the (float) function uses that number. If it does not start with a number, the (float) function convert strings into the number 0.


// any datatypeTo--->boolean  = To cast to boolean, use the (bool) statement:
// $a=0;
// $b=12;
// $str="60 Hello";

// $a=(bool)$a;
// var_dump($a);
// echo "<br>";
// $b=(bool)$b;
// var_dump($b);
// echo "<br>";
// $str=(bool)$str;
// var_dump($str);

// any datatypeTo--->array = To cast to array, use the (array) statement
// $a = 5;       // Integer
// $b = 5.34;    // Float
// $c = "hello"; //string

// $a=(array)$a;
// var_dump($a);
// echo "<br>";
// $b=(array)$b;
// var_dump($b);
// echo "<br>";
// $c=(array)$c;
// var_dump($c);

//any datatypeTo--->unset = To cast to NULL, use the (unset) statement
// $g=11;
// $h = "hello"; // String
// $i = true;    // Boolean
// $j = NULL;    // NULL

// $g=(unset)$g;
// var_dump($g);
// echo "<br>";
// $h=(unset)$h;
// var_dump($h);
// echo "<br>";
// $i=(unset)$i;
// var_dump($i);
// echo "<br>";
// $j=(unset)$j;
// var_dump($g);
// echo "<br>";

//The (unset) cast is no longer supported









?>