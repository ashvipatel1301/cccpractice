<?php
#basic arithmatic function

//abs = The abs() function returns the absolute (positive) value of a number.absolute value of 5 is 5 and -5 is 5
//echo abs(-11);       //11

//ceil = Rounds a number up to the nearest integer.
// echo ceil(11.11);     //12

// floor = Rounds a number down to the nearest integer.
// echo floor(11.11);   //11

//The round() function rounds a floating-point number to its nearest integer
// echo round(0.68);       //1
// echo "<br>";
// echo round(-4.40);     //-4
// echo "<br>";
// echo round(-4.60,2);      //-5

#power function
// pow = Returns the value of a base raised to the power of an exponent.
// echo pow(12,2);    //144

//sqrt = The sqrt() function returns the square root of a number:
// echo sqrt(25);        //5

#Random Number Generation
//Generates a random integer between the specified minimum and maximum 
// echo rand(12,20);

#Number Formatting
Formats a number with grouped thousands and a specified number of decimals.
echo number_format(12.22,0,".",",");


?>