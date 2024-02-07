<?php
include_once("connection.php");
include_once("functions.php");


$product_data=$_POST['pdata'];
print_r($product_data);

$id = $product_data['Product_id'];
// echo $id;
$obj = new builder();
$sql = $obj ->select('ccc_product',['*'],["where" => ['Product_id'=> $id]]);
// echo $sql;

$object = new trial();
$result = $object->fetch($conn,$sql);
// print_r($result);
if(empty($result)){
    // echo "isert";
    $obj = new builder();
    $sql = $obj ->insert('ccc_product',$product_data);
    $new_obj= new trial();
    $output = $new_obj->execution($conn,$sql);
    if($output==TRUE){
        echo "record inserted successfully!";
        return header("Location: records.php");
    }else{
        echo "Error updating record: " . mysqli_error($conn);
    }
}else{
    // echo "update";
    $obj = new builder();
    $sql = $obj ->update('ccc_product',$product_data, ['Product_id' => $id]);
    echo $sql;
    $new_obj=new trial();
    
    $output = $new_obj->execution($conn,$sql);
    if($output==TRUE){
        echo "record updated successfully!";
        return header("Location: records.php");
    }else{
        echo "Error updating record: " . mysqli_error($conn);
    }
}


?>