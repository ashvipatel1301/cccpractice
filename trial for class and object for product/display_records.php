<?php

include_once('classes_with_functions.php');
include_once('sql_connection.php');

$query=new builder();
$arr=['Product_id'=>5,'Productname'=>'shirt','SKU'=>12,'Category'=>'office'];
$sql= $query->select('ccc_product',$arr). " ORDER BY Product_id DESC LIMIT 20;";
echo $sql;

// $obj = new trial();
// $data=$obj->fetch($conn,$sql);

$object = new trial();
$data = $object->fetch($conn,$sql);
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
    <th>Product_ID</th>
    <th>Product Name</th>
    <th>SKU</th>
    <th>Category</th>
    <th>Edit</th>
    <th>Delete</th>

</tr>
</table>
";
if($data->num_rows > 0){
        while($row=$data->fetch_assoc()){
            $id=$row['Product_id'];
            echo "
            <table>
                <tr>
             
                <td>$row[Product_id]</td>
                <td>$row[Productname]</td>
                <td>$row[SKU]</td>
                <td>$row[Category]</td>
                <td><a href='update.php'>Update</a></td>
                <td><a href='delete.php?deleteid=".$id."'>Delete</a></td>
                </tr>
                </table>
            ";
        }
    }




?>