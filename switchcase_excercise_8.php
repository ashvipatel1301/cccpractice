<?php
/*The `switch` statement in PHP is used for efficient conditional operations where you have a
that you want to compare to multiple possible values.*/ 
 $dayOfWeek = "Sunday";

switch($dayOfWeek){
    case "Monday";
        echo "it is the start of the week";
        break;
    case "Tuesday";
    case "Wednesday";
    case "Thursday";
        echo "Weekday";
        break;
    case "Friday";
    case "saturday";
    case "Sunday";
        echo "Weekend,holiday";
        break;
    default:
        echo "invalid day of week";
    
    
    
    
    
    
        }









?>