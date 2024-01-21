<?php
#Arithmatic Operator

$x=5;
$y=3;
//1-Addition
// echo $x+$y;     //8

//2-Substraction
// echo $x-$y;   //2

//3-Multiplication:
// echo $x*$y;    //15

//Modulus (Remainder)
// echo $x%$y;    //2

// Exponentiation:
// echo $x**$y;   //125


#Assignment operator

//Assignment:
// echo $x=6;

// Addition Assignment
//  echo $x+=$y;                   // $X=10;
                    // $X+=100;
                    // echo $X;

//Subtraction Assignment
//  echo $x-=$y;                  // $X=10;
                    // $X-=100;
                    // echo $X;

//Multiplication Assignment
// echo $x*=$y;

// Division Assignment
// echo $x/+$y;

//Modulus Assignment
// echo $x%=$y;

// Comparison Operators

//Equal:
// var_dump($x == $y);
// echo $x == $y;   //not ans

//Not Equal
// echo $x != $y;    //1
// var_dump($x != $y);   //true

//Not Identical:Returns true if $x is not equal to $y, or they are not of the same type
// var_dump($x !== $y);   //true

// Greater Than:
//  echo $x > $y;   //1
// var_dump($x > $y);

// Less Than:
//var_dump($x < $y);

//Greater Than or Equal To-Returns true if $x is greater than or equal to $y
// var_dump($x >= $y);

//Less Than or Equal To
// var_dump($x <= $y);

//Logical Operators:

//Logical AND:
// var_dump($x==5 && $y==3);

// Logical OR
// var_dump($x==3||$y==1);  // one is necessary to be true

// Logical NOT:
// var_dump(!($x==7));     //True if $x is not true	

#Increment and Decrement Operators

// Increment:
// echo $x++;  //5
// echo ++$x;  //7

//Decrement:
// echo $x--;   //5
// echo --$x;      //4

#String Operators

//Concatenation
$str1="hello world";
$str2="Php";
$str3="hii";

// echo $str1.$str2;
//Concatenation Assignment:Appends $str2 to $str1

// echo $str1.=$str2;

#Conditional (Ternary) Operator:
//Ternary:is used for comparision
// echo $x(used here condition)?$y(if condition is true then this value is return):$z(else this);
//variable = (condition) ? (statement1) : (statement2)

// $num=$x>1 ? 12 : 11;
// echo $num;     //12




?>