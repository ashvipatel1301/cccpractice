<?php

//Exercise 1

$firstname = "Harsh";
$middlename = "Sanjaykumar";
$surname = "Patel" ;

echo $firstname ." ". $middlename ." ". $surname;


echo "<br>";
echo "---------------------------------------------------------";
echo "<br>";


//Exrcise 2
$text = "Hello, World! How are you doing?";
echo strlen($text);
echo "<br>";
echo strtolower($text);
echo "<br>";
echo strtoupper($text);
echo "<br>";
echo str_replace("How are you doing?","Fine, thank you!",$text);
echo "<br>";
echo substr($text,0,10);
echo "<br>";
echo substr($text,8);
echo "<br>";


echo "<br>";
echo "---------------------------------------------------------";
//Excercise 3
echo "<br>";


$sentence = "The quick brown fox jumps over the lazy dog";

echo strpos($sentence,"fox");

echo "<br>";
if (strpos($sentence,"cat")){
    echo "found";
}else{
    echo "not present";
}

echo "<br>";
echo substr($sentence,0,20);


echo "<br>";
echo "------------------------------------------------------------";
echo "<br>";


//Excercise

$name = "John";

echo str_pad($name,10,"_",STR_PAD_LEFT);
echo "<br>";
echo str_pad($name,8,"*",STR_PAD_RIGHT);


echo "<br>";
echo "------------------------------------------------------------";
echo "<br>";
//Excercise

$quote = "In three words I can sum up everything I've learned about life: it goes on.";

echo str_word_count($quote);
echo "<br>";

echo strtolower($quote);
echo "<br>";

//echo ucwords($quote);
echo "123";
echo "<br>";

?>