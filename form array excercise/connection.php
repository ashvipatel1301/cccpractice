<?php

include_once('sql_function.php');
   
$host="localhost";
$dbusername="root";
$dbpassword="";
$db="ccc_practice";

$conn=mysqli_connect($host,$dbusername,$dbpassword,$db);

try{
    if($conn){
        echo "successfully database is connected","<br>";
    
    }
}
    catch(Exception $e){
        echo "connection not established".mysqli_connect_error();
    
    }

//--------------insert function called---------------
$sql=insert('ccc_product',$product_data);
$result=mysqli_query($conn,$sql);

if($result){
    echo "Your record is inserted successfully";
}else{
    echo "your record is not inserted";
}

//---------------updated fucntion----------------

// $sql=update('ccc_product',$product_data,['Productname' =>"pencil",'sku'=>11]);   //where condition array ma pass karvani che
// $result=mysqli_query($conn,$sql);

// if($result){
//     echo "Your record is updated successfully";
// }else{
//     echo "your record is not updated";
// }

//------------deleted function -----------------
// $sql=delete('ccc_product',['product_id'=>2]);
// $result=mysqli_query($conn,$sql);

// if($result){
//     echo "deleted successfully";
// }else{
//     echo "your record is not deleted";
// }








?>