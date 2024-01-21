<?php
#Array Functions

#1=Array Creation and Initialization:

//array() or [] = create array
$arr1=array("apple","orange","banana");
$arr2=array("toyota","honda","volvo");

// echo count($arr1);     //counting array elements

// var_dump($arr1);



// print_r(array_merge($arr1, $arr2));  //Merges two or more arrays.

//print_r(array_combine($arr1, $arr2));  //kind of associate array key-->value pair,Creates an array by using one array for keys and another for its values.

//Creates an array containing a range of elements.
//range($start(starting point), $end(end point), $step(optional, the increament bet element in sequesnce)):
// print_r(range(2,10,2));

#Array modification

//array_push= Adds one or more elements to the end of an array.
// array_push($arr1,"12","pineapple");
// print_r($arr1);

//array_pop= Removes the last element from an array.
// array_pop($arr1);
// print_r($arr1);      //remove banana

// arary_unshift =Adds one or more elements to the beginning of an array.
// array_unshift($arr1,"123","23");
// print_r($arr1);         //add 123 and 23 first in arr1 

//array_shift=Removes the first element from an array.
// array_shift($arr1);
// print_r($arr1);       //remove apple 


// Replace the values of the first array ($arr1) with the values from the second array ($arr2)
// print_r(array_replace($arr1,$arr2));

// array_splice=Remove elements from an array and replace it with new elements:
// array_splice($arr1,2,2,$arr2);
// print_r($arr1);

// $a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
// $a2=array("a"=>"purple","b"=>"orange");
// array_splice($a1,0,2,$a2);
// print_r($a1);

#array search

//in_array=Checks if a value exists in an array.
      // var_dump(in_array("orange",$arr1));

//array_search=Searches an array for a given value and returns the corresponding key.
       // print_r(array_search("orange",$arr1));     //1--index of orange

//array_reverse=Returns an array with elements in reverse order.
        // print_r(array_reverse($arr1));

#array sorting

//sort=Sorts an array.
        $numbers=array(4, 6, 2, 22, 11);
        // sort($numbers);

        // foreach($numbers as $x){
        //     echo $x;
        //     echo "<br>";
        // }


//rsort=Sorts an array in reverse order.
            // rsort($numbers);
            // foreach($numbers as $x){
            //         echo $x;
            //         echo "<br>";
            //     }
//asort=Sorts an associative array by values.
    $age=array("Peter"=>"35","Ben"=>"46","Joe"=>"43");
            // asort($age);

            // foreach($age as $x=>$x_value){
            //     echo $x ."=" .$x_value;
            //     echo "<br>";
            // }

//ksort=orts an associative array by keys.

            //ksort($age);

            // foreach($age as $x=>$x_value){
            //     echo $x ."=" .$x_value;
            //     echo "<br>";
            // }
//arsort=Sorts an associative array in reverse order by values.
        // arsort($age);
        //     foreach($age as $x=>$x_value){
        //         echo $x ."=" .$x_value;
        //         echo "<br>";
        //     }

//krsort=Sorts an associative array in reverse order by keys.
            // krsort($age);
            // foreach($age as $x=>$x_value){
            //         echo $x ."=" .$x_value;
            //         echo "<br>";
            //     }
                
#Array filtering

// array_filter=Filters elements of an array using a callback function.


            // function Check($numbers){
            //     if($numbers%2==0){
            //         return TRUE;
            //     }else{
            //         return FALSE;
            //     }
            // }

                $numbers=array(4, 6, 2, 22, 11);
            //     print_r(array_filter($numbers,"Check"));


//array_map=Applies a callback function to each element of an array.
            // function myfunction($num)
            // {
            // return($num*$num);
            // }

            // $a=array(1,2,3,4,5);
            // print_r(array_map("myfunction",$a));

//array_reduce=Iteratively reduces the array to a single value using a callback function.
 //two parameter are passed in function  and concateness is done among them by and or anything like(-)

            // function myfunc($v1,$v2){
            //     return $v1 . "-" . $v2;
            // }

            // $a=array("dog","cat","horse");
            // //  print_r(array_reduce($a,"myfunc"));   //-dog-cat-horse
            // print_r(array_reduce($a,"myfunc",5));   //5-dog-cat-horse

#array slicing

//array_slice=Extracts a portion of the array.
            // print_r(array_slice($numbers,1,5,true));    //Array ( [1] => 6 [2] => 2 [3] => 22 [4] => 11 )
            print_r(array_slice($numbers,2));  //Array ( [0] => 2 [1] => 22 [2] => 11 )



?>