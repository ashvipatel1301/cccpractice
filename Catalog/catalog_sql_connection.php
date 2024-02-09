<?php
// $product_data=$_POST['pdata'];
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
//this is for button click actions 
if(isset($_POST['insert'])){
    $product_data=$_POST['pdata'];
    $sql1=insert('ccc_product',$product_data);
    $result=mysqli_query($conn,$sql1);
    
    if($result){
        echo "Your record is inserted successfully";
    }else{
        echo "your record is not inserted";
    }
}
elseif(isset($_POST['update'])){
    $product_data=$_POST['pdata'];
    $sql2=update('ccc_product',$product_data,['Product_id'=>8]);
    $result=mysqli_query($conn,$sql2);
    if($result){
        echo "Your record is updated successfully";
    }else{
        echo "your record is not updated";
    }

}
elseif(isset($_POST['delete'])){
    $product_data=$_POST['pdata'];
    $sql3=delete('ccc_product',['Product_id'=>12]);
    $result=mysqli_query($conn,$sql3);
    if($result){
        echo "Your record is deleted successfully";
    }else{
        echo "your record is not deleted";
    }

}
?>