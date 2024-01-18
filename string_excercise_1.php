
<?php

//echo strlen("hello world");   //12

//echo str_replace("good","great","good morning");  //great morning

//echo strpos("hello world","world");     //6

//echo substr("hello world",7,5);   //world

//echo strtolower("Hello World");   //hello world

//echo strtoupper("Hello World");    //HELLO WORLD

//echo trim(" Hello World ");        //--Hello World

//echo implode(" ",array("honda","activa","scooty"));  //honda activa scooty

//print_r(explode(" ","hello world"));   //Array ( [0] => hello world [1] => hii )

//echo htmlspecialchars("this is <i>italic</i> word");   //this is <i>italic</i> word

/*
echo $str='<b>hello world</b>';
echo htmlentities("<b>hello world</b>");
*/


//echo str_repeat("Wow",5);      //WowWowWowWowWow

//echo strrev("hello world");    //dlrow olleh

//print_r(str_split("hello world"));     //Array ( [0] => h [1] => e [2] => l [3] => l [4] => o [5] => [6] => w [7] => o [8] => r [9] => l [10] => d )

//echo str_shuffle("hello world");    //dhl ewrlloo

//echo str_word_count("hello world ");    //2

//echo substr_replace("hello world","india",2,2);     //heindiao world

//echo str_pad("hello guys",15,"*",STR_PAD_RIGHT);      //hello guys*****

//echo strcoll("hello world","hello world");   //0

//echo strcspn("hello world","w");   //6

//echo stristr("hello world of india","wo");   //world of india

//echo ucfirst("india is pride for me");   //India is pride for me   



//echo ucwords("india is pride for me");  //India Is Pride For Me
//------------------------------------------------------------------------
/*
$str="My name is ashvi";


//strlent==to find string lenth
echo strlen("My name is ashvi") ;   // 15   

//str_replace= replaces some characters with some other characters in a string.
echo str_replace("ashvi","ashu",$str);   // My name is ashu

//strpos=Find the position of the first occurrence of "name" inside the string(str):
echo strpos("I love India,India is my country!","India");     //7
echo strpos($str,"is");

//substr=Return "ashvi" from the string
//this function will Returns a part of a string starting from the specified position and with a specified length.
echo substr($str,11);
echo substr("hello world!",4,6);

//strtolower=convert a string to lower case
echo strtolower($str); 

//strtoupper=Converts a string to uppercase.
echo strtoupper($str);

//trim=Removes whitespace or other predefined characters from the beginning and end of a string.
//(note that if you are give "yas" for remove then its give string as it is not work, so give starting and any char with that)

echo trim($str,"Myas");


//implode=Joins array elements with a string.
$arr=array("currently","studying","B.Tech");
                //echo implode($str,$arr);---- not working
echo implode("",$arr);


//explode= Splits a string into an array by a specified delimiter.

echo explode(",",$str);


// htmlspecialchars= Converts special characters to HTML entities(like > and <).
echo htmlspecialchars("this is <i>italic</i> word");
/*echo $string="this is <i>italic</i> word";
echo htmlspecialchars($string,ENT_QUOTES);


//htmlentities= Converts all applicable characters to HTML entities.
$string='<a href="https://www.w3schools.com">Go to w3schools.com</a>';
echo htmlentities($string);


//str_repeat=Repeats a string a specified number of times
//Repeat the string "Ashvi" 13 times:
echo str_repeat("Ashvi",13);


//strrev=Reverses a string.
echo strrev($str);


//str_shuffle=Randomly shuffles all characters in a string.
echo str_shuffle($str);



//str_split=Converts a string to an array, breaking it into smaller chunks.
#echo str_split("hello");
//print_r(str_split("Hello"));    //working=print_r is used to print the information that is more readable to human




//Returns the number of words in a string.
echo str_word_count($str);



//Replaces a portion of a string with another string.substr_replace($string, $replacement, $start, $length):
echo substr_replace("hello world","Ashvi",2,1);
//echo substr_replace("ashvi","ashu",0);


//Pads a string to a certain length with another string.str_pad($string, $length, $pad_string, $pad_type):
#not got it
echo str_pad("hello",10,"*",STR_PAD_RIGHT);   //hello*****


/*
Locale based string comparison.strcoll($string1, $string2).0 - if the two strings are equal
<0 - if string1 is less than string2
>0 - if string1 is greater than string2


echo strcoll("hello world","hello world");


//Print the number of characters found in "Hello world!" before the character "w":
//Finds the length of the initial segment not matching a mask.strcspn($string, $mask, $start, $length):
echo strcspn("hello world","w");


//Case-insensitive search for the first occurrence of a string and return afterword all the words.stristr($haystack, $needle, $before_needle):

echo stristr("hello world ashvi patel","Ash");
    


//Converts the first character of a string to uppercase.
echo ucfirst("india is pride for indians");



//Converts the first character of each word in a string to uppercase.
echo ucwords("india is pride for indians");
*/







?>





