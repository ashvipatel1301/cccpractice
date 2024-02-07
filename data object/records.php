<?php

include_once("recordslist_object.php");

$query = new builder();

// $sql = $query->select('ccc_product', '*', ["where" => [], "order_by" => ["product_id DESC"], "limit" => 10]);
// $sql = "SELECT * FROM ccc_product";
$sql = $query->select('ccc_product', ['*']); 
echo $sql;
$obj = new trial();
$temp = $obj->fetch($conn,$sql);
// print_r($temp);
$new_object = new Data_Collection_Object();

foreach($temp as $_temp){
    $new_object->addData($_temp);
}
echo "
        <head>
    <style>
    table, th, td {
    border: 1px solid black;
    }
    table{
        width: 100%;
        table-layout: fixed;
    </style>
    </head>
    <table>
    <tr>
        <th>Product_Id</th>
        <th>Product Name</th>
        <th>SKU</th>
        <th>Category</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

";
    foreach($new_object->getData() as $_mdata){
    $id = $_mdata->getProduct_id();
  
    echo "<tr>"; 
    echo "<td>" .$_mdata->getProduct_id() . "</td>"; 
    echo "<td>" .$_mdata->getProductname() . "</td>"; 
    echo "<td>" .$_mdata->getSKU() . "</td>";
    echo "<td>" .$_mdata->getCategory() . "</td>";
    echo "<td><a href='form.php?productid=" .$id. "'>Edit</a></td>";
    echo "<td><a href='delete.php?deleteid=" .$id. "'>Delete</a></td>";
    echo "</tr>"; 
   
    
    }
echo "</table>";
    // print_r($_mdata);
    // echo "<br>";
    // print_r($_mdata->getProduct_id());
    // echo "<br>";
    // print_r($_mdata->getProductname());
    // echo "<br>";
    // print_r($_mdata->getSKU());
    // echo "<br>";
    // print_r($_mdata->getCategory());
    // echo "<br>";



?>