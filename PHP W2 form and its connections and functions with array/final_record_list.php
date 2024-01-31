 <?php

include_once("connection.php");

$sql = "SELECT * FROM ccc_product ORDER BY Product_id  DESC LIMIT 10 ";   //this will returns last 10 records but in descending order like id 12 then id 11
// $sql = "SELECT * FROM ("SELECT * FROM ccc_product ORDER BY Product_id  DESC LIMIT 10 ") ORDER BY Product_id ASC ";



 // FETCHING DATA FROM DATABASE
$result = $conn->query($sql);

if($result->num_rows > 0){
//fetch_assoc() function will return array
    while($row=$result->fetch_assoc()){

        // echo "id: " . $row["id"].
       echo                  //  //for the list ul/li
       "<ul>                         
             <li>$row[Productname]
             $row[SKU].
             $row[Producttype].
             $row[Category].
             $row[Manufacturercost].
             $row[Shippingcost].
             $row[Totalcost].
             $row[Price].
             $row[Status].
             $row[Created_At].
             $row[Updated_At].</li>
             
           </ul>";
        // "productname: " . $row["Productname"].
        // "-SKU: " . $row["SKU"].
        // "Producttype: " . $row["Producttype"].
        // "-Category: " . $row["Category"].
        // "-Manufacturercost: " . $row["Manufacturercost"].
        // "-Shippingcost: " . $row["Shippingcost"].
        // "-Total_cost: " . $row["Totalcost"].
        // "-Price: " . $row["Price"] .
        // "-Status: " . $row["Status"] .
        // "-Created_At: " . $row["Created_At"] .
        // "-Updated_A: " . $row["Updated_At"]. "<br>";
      

     }
}else{
    echo " 0 results";
}

$conn->close();
?>