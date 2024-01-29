<?php
//Here create form for inserting new records and updating existing records. The same form and file will be used for both insert and update

include_once("catalog_sql_connection.php");
include_once("catalog_sql_function.php");

//---------for inserting-------------

// $sql = insert('ccc_product',$product_data);
// $result =$conn->query($sql);
// if($result){
//     echo "record is inserted";
// }else{
//     echo "error in inserting";
// }

//----------for updating--------

$sql1 = update('ccc_product',['productname'=>'toyota'],['category'=>"Lighting"]);
$result =$conn->query($sql1);
if($result){
    echo "record is updated";
}else{
    echo "error in updating";
}




?>