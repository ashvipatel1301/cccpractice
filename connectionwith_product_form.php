<?php

$Productname= $_POST['productname'];
$SKU= $_POST['sku'];
$Producttype= $_POST['product_type'];
$Category= $_POST['category'];
$ManufacturerCost= $_POST['manufacturercost'];
$Shippingcost= $_POST['shippingcost'];
$Totalcost= $_POST['totalcost'];
$Price= $_POST['price'];
$Status= $_POST['statusdetails'];

$Created_At= $_POST['createdcost'];
$Updated_At= $_POST['updatedcost'];

//$
// echo $Productname;

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
$sql="INSERT INTO `ccc_product`(`Productname`, `SKU`, `Producttype`, `Category`, `Manufacturercost`, `Shippingcost`, `Totalcost`, `Price`, `Status`, `Created_At`, `Updated_At`) 
values('$Productname',$SKU,'$Producttype','$Category',$ManufacturerCost,$Shippingcost,$Totalcost,$Price,'$Status','$Created_At','$Updated_At')";


    if($conn->query($sql)){
        echo "New record is inserted";

    }
    

    
    $conn->close();




    




?>
