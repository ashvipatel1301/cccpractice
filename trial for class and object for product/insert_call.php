<?php

include_once("sql_connection.php");
include_once("classes_with_functions.php");
$product_data=$_POST['pdata'];

$query=new builder();
$sql= $query->insert('ccc_product',$product_data);

$obj= new trial();
$output = $obj->execution($conn,$sql);
if($output==TRUE){
   echo "record iserted successfully";   
}else{
    echo "record is not inserted";
}



?>