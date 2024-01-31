<?php
$host="localhost";
$root="root";
$password="";
$db="ccc_practice";
$conn=mysqli_connect($host,$root,$password,$db);
try{
if($conn){
    echo "connection is successfull";
}
}catch(Exception $e){
    echo "Error in connection".mysqli_connect_error();

}




?>