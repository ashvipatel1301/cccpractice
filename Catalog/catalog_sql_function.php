<?php
$product_data=$_POST['pdata'];
// $cat_name = $_POST['cdata'];     //when connection with category wala table
// print_r($product_data);

//--------------insert-----------
function insert($tableName,$data){    //data je form mathi lidho ae che

    $column = $value = [];

    foreach($data as $_key => $_value){

        $column[]= "`{$_key}`";    // ``this because in sql we give column name in this by default because some key word are predefine so
        $values[]= "'".addslashes($_value)."'";    // because values we pass in insertion is string if some int then we dont need here '' but woh default sir after learn karvayege
    }                                     // if string ya query ma val aave che and ' avase to stop thai jse ke agal string nthi so ae aeni jate addslashes add akrse for continue 
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
    // print_r($wherecond);
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

// ---------------------select----------------------

function select($tableName,$data){

    // if * joie che then if condition lagavi padse like
    if($data == '*'){
        return " SELECT {$data} FROM {$tableName}";
    }else{    //je niche walu che ae
     
    $column = [];
    foreach($data as $_key => $_value){
        $column[]= "`{$_key}`"; 
        // $values[]= "'".addslashes($_value)."'";  
    }
    $column = implode(",",$column);
    // $values = implode(",",$values);
return "SELECT {$column} FROM {$tableName}";
    }

}


?>