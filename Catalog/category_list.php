<?php

    $cat_name = $_POST['name'];
    
    include_once("catalog_sql_connection.php");
    include_once("catalog_sql_function.php");

    $sql=select('ccc_category','*');
    $result=mysqli_query($conn,$sql);

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
        <th>Category_Id</th>
        <th>Category Name</th>
    </tr>
    </table>
";
if($result->num_rows > 0){
    while($row=$result->fetch_assoc()){
        echo "
        <table>
            <tr>
            <td>$row[cat_id]</td>
            <td>$row[name]</td>
            </tr>
        </table>
        ";
    }
}

    

  

?>