<?php
?>
<!DOCTYPE html>
<head>
   <title>HTML FORM PRACTICE</title>
</head>
<body>
    <h1 style=text-align:center>Product Details Form Template</h1>
    <form action="insert_call.php" method="post">
        <table>
            <tr>
                <td>
                    Product ID:
                </td>
                <td>
                    <input type="number" placeholder="Product ID" name="pdata[Product_id]">
                </td>
            </tr>
            <tr>
                <td>
                    Product Name:
                </td>
                <td>
                    <input type="text" placeholder="Product Name" name="pdata[Productname]">
                </td>
            </tr>
            <tr>
                <td>
                    SKU:
                </td>
                <td>
                    <input type="text" placeholder="Stock Keeping Unit" name="pdata[SKU]">
                </td>
            </tr>
            <tr>
                <td>
                    Product Type:
                </td>
                <td>
                    <input type="radio" name="pdata[Producttype]" value="s">Simple
                    <input type="radio" name="pdata[Producttype]" value="b">Bundle

                </td>
            </tr>
            <tr>
                <td>
                    Category:
                </td>
                <td>
                    <select name="pdata[Category]" id="Category">
                        <option>Select Option</option>
                        <option>Bar & Game Room</option>
                        <option>Bedroom</option>
                        <option>Decor</option>
                        <option>Dining & Kitchen</option>
                        <option>Lighting</option>
                        <option>Living Room</option>
                        <option>Mattress</option>
                        <option>Office</option>
                        <option>Outdoor</option>

                    </select>
                </td>
                
            </tr>
            <tr>
                <td>
                    Manufacturer Cost:
                </td>
                <td>
                    <input type="text" placeholder="Manufacturercost" name="pdata[Manufacturercost]">
                </td>
            </tr>
            <tr>
                <td>
                    Shipping Cost:
                </td>
                <td>
                    <input type="text" placeholder="Shippingcost" name="pdata[Shippingcost]">
                </td>
            </tr>
            <tr>
                <td>
                    Total Cost:
                </td>
                <td>
                    <input type="text" placeholder="total cost" name="pdata[Totalcost]">
                </td>
            </tr>
            <tr>
                <td>
                   Price:
                </td>
                <td>
                    <input type="text" placeholder="price RS." name="pdata[Price]">
                </td>
            </tr>
            <tr>
                <td>
                    Status:
                </td>
                <td>
                    <select name="pdata[Status]" id="statusdetails">
                        <option>Select Option</option>
                        <option>Enable</option>
                        <option>Disable</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Created At:
                </td>
                <td>
                    <input type="date" name="pdata[Created_At]">
                </td>
            </tr>
            <tr>
                <td>
                    Updated At:
                </td>
                <td>
                    <input type="date" name="pdata[Updated_At]">
                </td>
            </tr>
            <tr>
                <td>
                   <input type="submit" value="update">
                   <input type="reset" value="reset">
                </td>
            </tr>

        </table>
    </form>
</body>
</html>
<!-- // include_once("sql_connection.php");
// include_once("classes_with_functions.php");

// $query=new builder();
// $product_data=$_POST['pdata'];
// $sql =$query->update('ccc_product',$product_data,['Product_id'=>5]);
// // echo $sql;
// $obj = new trial();
// $output = $obj->execution($conn,$sql);
// if($output==TRUE){
//     echo "record is updated successfully";   
//  }else{
//      echo "record is not updated";
//  } -->

