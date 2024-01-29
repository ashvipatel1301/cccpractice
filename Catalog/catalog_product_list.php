<?php
include_once('catalog_sql_connection.php');
include_once('catalog_sql_function.php');


//----------for check one query to work properly or not-------

// $sql=insert('ccc_product',$product_data);
// $result=mysqli_query($conn,$sql);

// if($result){
//     echo "Your record is inserted successfully";
// }else{
//     echo "your record is not inserted";
// }

//--------------Here we will list the last 20 records from the database in table (TR/TD) structure
// $arr=['Productname'=>'shirt','SKU'=>12,'category'=>'office'];
// $query = select('ccc_product','*')." ORDER BY product_id DESC LIMIT 20;" ;  //this will give all records with column name and last 20 records
// print_r($query);
// $query = select('ccc_product',$arr)." ORDER BY product_id DESC LIMIT 20;" ; 
// $result = $conn->query($query);

// while ($row = $result->fetch_assoc()) {
//     print_r($row);
// }


//---------------Show “Product Name”, “SKU”, “Category” columns
// $arr=['Productname'=>'shirt','SKU'=>12,'category'=>'office'];
// $query = select('ccc_product',$arr);
// $result = $conn->query($query);

// // $obj = mysqli_fetch_object($result);

// while ($row = $result->fetch_assoc()) {
//     print_r($row);
// }

//-----------Add 2 new columns, edit and delete with a tag link to catalog/product.php
$arr=['Productname'=>'shirt','SKU'=>12,'Category'=>'office'];
$query = select('ccc_product',$arr)." ORDER BY product_id DESC LIMIT 20;" ;
$result = $conn->query($query);


// echo "
// <head>
// <style>
// table, th, td {
//   border: 1px solid black;
// }
// table{
//     width: 100%;
//     table-layout: fixed;
// </style>
// </head>

// <table >
//     <tr>
//     <th>Product_Id</th>
//     <th>Product Name</th>
//     <th>SKU</th>
//     <th>Product_type</th>
//     <th>Category</th>
//     <th>Manufacturer cost</th>
//     <th>Shipping Cost</th>
//     <th>Total_cost</th>
//     <th>Price</th>
//     <th>Status</th>
//     <th>Created_At</th>
//     <th>Updated_At</th>
//     </tr>
// </table>
// ";
// if($result->num_rows > 0){
//     while($row=$result->fetch_assoc()){
//     echo"
//     <table>
//     <tr>
//     <td>$row[Product_id]</td>
//     <td>$row[Productname]</td>
//     <td>$row[SKU]</td>
//     <td>$row[Producttype]</td>
//     <td>$row[Category]</td>
//     <td>$row[Manufacturercost]</td>
//     <td>$row[Shippingcost]</td>
//     <th>$row[Totalcost]</td>
//     <td>$row[Price]</td>
//     <td>$row[Status]</td>
//     <td>$row[Created_At]</td>
//     <td>$row[Updated_At]</td>
//     </tr>
//     </table>
//     ";
//    }
// }
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
    <th>Product Name</th>
    <th>SKU</th>
    <th>Category</th>
    <th>Edit</th>
    <th>Delete</th>

</tr>
</table>
";
if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
            echo "
            <table>
                <tr>
                <td>$row[Productname]</td>
                <td>$row[SKU]</td>
                <td>$row[Category]</td>
                <td><a href='html_form_product.html'>Edit</a></td>
                <td><a href='html_form_product.html'>Delete</a></td>
                </tr>
                </table>
            ";
        }
    }
//?deletid=".$id."









?>