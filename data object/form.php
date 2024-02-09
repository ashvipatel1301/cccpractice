<!DOCTYPE html>
<head>
   <title>HTML FORM PRACTICE</title>
</head>
<body>
    <h1 style=text-align:center>Product Details Form Template</h1>
   <?php
     include_once("connection.php");
     include_once("functions.php");
     include_once("recordslist_object.php");
         $id=isset($_GET['productid'])?$_GET['productid']:0;
        // $id=$_GET['Product_id'];
        // echo $id;
        $object = new builder();
        // $sql = "SELECT * FROM ccc_product WHERE Product_id = $id ";
        $sql = $object ->select('ccc_product',['*'],["where" => ['Product_id'=> $id]]);
        echo $sql;
        $query=new trial();
        $result= $query->fetch($conn,$sql);
        // print_r($result);
        if(empty($result)){
            $obj = new Data_Object($result);
        }else{
        $obj = new Data_Object($result[0]);
        }
        // print_r($obj->getProductname(''));
    
   ?> 
<form action="insert_update.php" method="post">
        <table>
            <tr>
                <td>
                    
                </td>
                <td>
                    <input type="hidden" placeholder="Product ID" value="<?php echo $obj->getProduct_id('0') ?>" name="pdata[Product_id]">
                </td>
            </tr>
            <tr>
                <td>
                    Product Name:
                </td>
                <td>
                <input type="text" value="<?php echo $obj->getProductname('') ?>" placeholder="Product Name" name="pdata[Productname]">
                </td>
            </tr>
            <tr>
                <td>
                    SKU:
                </td>
                <td>
                    <input type="text" placeholder="Stock Keeping Unit" value="<?php echo $obj->getSKU('') ?>"name="pdata[SKU]">
                </td>
            </tr>
            <tr>
                <td>
                    Product Type:
                </td>
                <td>
                <input type="radio" name="pdata[Producttype]" value="s" <?php if(count($result) > 0 && $result[0]['Producttype'] == 's'){echo 'checked'; } ?>>Simple
                <input type="radio" name="pdata[Producttype]" value="b" <?php if(count($result) > 0 && $result[0]['Producttype'] == 'b'){echo 'checked'; }?>>Bundle
                    
                </td>
            </tr>
            <tr>
                <td>
                    Category:
                </td>
                <td>
                    <select name="pdata[Category]" id="Category">
                        <option>Select Option</option>
                        <option value ="Bar & Game Room" <?php if(count($result) > 0 && $result[0]['Category'] == 'Bar & Game Room'){echo 'selected'; } ?>>Bar & Game Room</option>
                        <option value = "Bedroom" <?php if(count($result) > 0 && $result[0]['Category'] == 'Bedroom'){echo 'selected'; } ?>>Bedroom</option>
                        <option value = "Decor" <?php if(count($result) > 0 && $result[0]['Category'] == 'Decor'){echo 'selected'; } ?>>Decor</option>
                        <option value = "Dining & Kitchen" <?php if(count($result) > 0 && $result[0]['Category'] == 'Dining & Kitchen'){echo 'selected'; } ?>>Dining & Kitchen</option>
                        <option value = "Lighting" <?php if(count($result) > 0 && $result[0]['Category'] == 'Lighting'){echo 'selected'; } ?>>Lighting</option>
                        <option value = "Living Room" <?php if(count($result) > 0 && $result[0]['Category'] == 'Living Room'){echo 'selected'; } ?>>Living Room</option>
                        <option value = "Mattress" <?php if(count($result) > 0 && $result[0]['Category'] == 'Mattress'){echo 'selected'; } ?>>Mattress</option>
                        <option value = "Office" <?php if(count($result) > 0 && $result[0]['Category'] == 'Office'){echo 'selected'; } ?>>Office</option>
                        <option value = "Outdoor" <?php if(count($result) > 0 && $result[0]['Category'] == 'Outdoor'){echo 'selected'; } ?>>Outdoor</option>

                    </select>
                </td>
                
            </tr>
            <tr>
                <td>
                    Manufacturer Cost:
                </td>
                <td>
                    <input type="text" placeholder="Manufacturercost" value="<?php echo $obj->getManufacturercost('') ?>" name="pdata[Manufacturercost]">
                </td>
            </tr>
            <tr>
                <td>
                    Shipping Cost:
                </td>
                <td>
                    <input type="text" placeholder="Shippingcost" value="<?php echo $obj->getShippingcost('') ?>" name="pdata[Shippingcost]">
                </td>
            </tr>
            <tr>
                <td>
                    Total Cost:
                </td>
                <td>
                    <input type="text" placeholder="total cost" value="<?php echo $obj->getTotalcost('') ?>" name="pdata[Totalcost]">
                </td>
            </tr>
            <tr>
                <td>
                   Price:
                </td>
                <td>
                    <input type="text" value="<?php echo $obj->getPrice('') ?>" placeholder="price RS." name="pdata[Price]">
                </td>
            </tr>
            <tr>
                <td>
                    Status:
                </td>
                <td>
                    <select name="pdata[Status]" id="statusdetails">
                        <option>Select Option</option>
                        <option value="Enable" <?php if(count($result) > 0 && $result[0]['Status'] == 'Enable'){echo 'selected'; } ?>>Enable</option>
                        <option value="Disable" <?php if(count($result) > 0 && $result[0]['Status'] == 'Disable'){echo 'selected'; } ?>>Disable</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Created At:
                </td>
                <td>
                    <input type="date" value=<?php echo $obj->getCreated_At('') ?> name="pdata[Created_At]">
                </td>
            </tr>
            <tr>
                <td>
                    Updated At:
                </td>
                <td>
                    <input type="date" value= <?php echo $obj->getUpdated_At('') ?> name="pdata[Updated_At]">
                </td>
            </tr>
            <tr>
                <td>
                   <input type="submit" name='isert' value="submit">
                   <input type="reset" value="reset">
                </td>
            </tr>

        </table>
    </form>
</body>
</html>
