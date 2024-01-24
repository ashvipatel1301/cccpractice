<?php
/*The `switch` statement in PHP is used for efficient conditional operations where you have a
that you want to compare to multiple possible values.*/ 
// $dayOfWeek = "Sunday";

// switch($dayOfWeek){
//     case "Monday";
//         echo "it is the start of the week";
//         break;
//     case "Tuesday";
//     case "Wednesday";
//     case "Thursday";
//         echo "Weekday";
//         break;
//     case "Friday";
//     case "saturday";
//     case "Sunday";
//         echo "Weekend,holiday";
//         break;
//     default:
//         echo "invalid day of week";
    

/*
The `switch` statement evaluates the value of `$dayOfWeek`.
- Each `case` checks whether it matches a specific day of the week.
- The `break` statement terminates the `switch` statement once a match is found. If omitted, execution would continue to the next `case`.
- The `default` case is executed if none of the specified cases match.

*/
// $n=10;
// for($i=$n;$i>=1;$i--){
//     for($j=1;$j<=$i;$j++){
        
//         echo $j;
        
//     }
//     echo "<br>";
// }
    

// $a=5;
// for($i=1; $i<= $a; $i++){
//     for($j=1; $j<=$a; $j++){
//         if($i){
//             echo("$j");
//         }
//     }
//     echo "<br>";
// }<?php
$n=10;
for($i=1;$i<=$n;$i++){

    for($j=1;$j<=$n;$j++){
        if($j<=($n+1)-$i){
        echo $j." ";
        }
    }
    echo "<br>";
}




?>