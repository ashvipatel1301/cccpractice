<?php

include_once("sql_connection.php");
include_once("classes_with_functions.php");

if(isset($_GET['deleteid'])){
     
    $id=$_GET['deleteid'];

    $sql=new builder();
    $query=$sql->delete('ccc_product',['Product_id'=>$id]);
    // echo $query;

    $obj=new trial();
    $output=$obj->execution($conn,$query);
    echo $output;
}


?>