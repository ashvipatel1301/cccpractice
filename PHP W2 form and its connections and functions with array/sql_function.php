<?php

$product_data=$_POST['pdata'];

// print_r($product_data);   //this will give o/p as key val pair as we gave Array ( [productname] => fan [sku] => 1 [product_type] => s [category] => Office [manufacturercost] => 12 [shippingcost] => 324 [totalcost] => 4 [price] => 4 [createdcost] => 2024-01-13 [updatedcost] => 2024-01-04 )


function insert($tableName,$data){    //data je form mathi lidho ae che

    $column = $value = [];

    foreach($data as $_key => $_value){

        $column[]= "`{$_key}`";    // ``this because in sql we give column name in this by default because some key word are predefine so
        $values[]= "'".addslashes($_value)."'";    // because values we pass in insertion is string if some int then we dont need here '' but woh default sir after learn karvayege
    }
    $columns = implode(",",$column);   //,  is in query used as seperation 
    $values = implode(",",$values);


   return "INSERT INTO {$tableName}({$columns}) VALUES ({$values})";
}

//  insert("ccc",$product_data);

//----------------UPDATE---------------

  function update($tableName,$data,$where){

    $column = $wherecond = [];
    foreach($data as $_key=>$_value){
        $set_cond[] = "`{$_key}` = " . "'" . addslashes($_value). "'";

    }
    $column = implode(",",$set_cond);


    foreach($where as $_key => $_value){
        $wherecond[] = "`{$_key}` = " . "'" . addslashes($_value). "'";

    }
    print_r($wherecond);
    $wherecond = implode(" AND " , $wherecond);


return  "UPDATE {$tableName} SET {$column} WHERE {$wherecond}";   //update tablename set col-val where condition;
}

// update("ccc",['aads'=>12,'scd'=>23],['id'=>11,'email'=>"@gamil"]);

//------------------DELETE-------------------

function delete($tableName,$where){
    $wherecond = [];
    foreach($where as $_key => $_value){
        $wherecond[] = "`{$_key}` = " . "'" . addslashes($_value). "'";
    }
    // print_r($wherecond);
    $wherecond = implode(" AND ",$wherecond);

    return " DELETE FROM {$tableName} WHERE {$wherecond} ";     //DELETE FROM table_name WHERE condition;
}

// delete("ccc",['id'=>11,'email'=>"@gmail"]);

?>