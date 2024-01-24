<?php
include_once("connection.php");
// $product_data=$_POST['pdata'];

$query=" SELECT*FROM 'ccc_product';";

$result = $conn->query($query);

if($result->num_rows>0){

    while($row=$result->fetch_assoc()){
        echo "id: " . $row["id"].
        . "-productname: "

    }
}








?>