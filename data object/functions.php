<?php

class builder{

    public function insert($tableName,$data){    //data je form mathi lidho ae che

        $column = $value = [];
    
        foreach($data as $_key => $_value){
    
            $column[]= "`{$_key}`";    // ``this because in sql we give column name in this by default because some key word are predefine so
            $values[]= "'".addslashes($_value)."'";    // because values we pass in insertion is string if some int then we dont need here '' but woh default sir after learn karvayege
        }                                     // if string ya query ma val aave che and ' avase to stop thai jse ke agal string nthi so ae aeni jate addslashes add akrse for continue 
        $columns = implode(",",$column);   //,  is in query used as seperation 
        $values = implode(",",$values);
    
    
      return "INSERT INTO {$tableName}({$columns}) VALUES ({$values})";
    }

//----------------UPDATE---------------

public function update($tableName,$data,$where){

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
//------------------DELETE-------------------

public function delete($tableName,$where){
    $wherecond = [];
    foreach($where as $_key => $_value){
        $wherecond[] = "`{$_key}` = " . "'" . addslashes($_value). "'";
    }
    // print_r($wherecond);
    $wherecond = implode(" AND ",$wherecond);

    return " DELETE FROM {$tableName} WHERE {$wherecond} ";     //DELETE FROM table_name WHERE condition;
}
// ---------------------select----------------------

//----------select function with where caluse and order by-----

public function select($tableName,$data,$extra = []){
    $columns = [];
    foreach($data as $cols){
     if($cols == '*'){
       $columns[]=$cols;

     }else{
       $columns[] ="`$cols`";
     }

     $columns = implode(",",$columns);
     $sql = "SELECT {$columns} FROM {$tableName} ";
   }
    if( isset($extra['where']) && !empty($extra['where'])){
       $where = [];
       foreach($extra['where'] as $_key => $_value){
           $where[] = "$_key = '$_value'";
       }
       $where = implode(' AND', $where);
       $sql .= " WHERE {$where} ";

   }if(isset( $extra['order_by']) && !empty($extra['order_by'])){
       $orderby=implode(",",$extra['order_by']);
       $sql .= " ORDER BY {$orderby}";

   }if(isset( $extra['limit']) && !empty($extra['limit'])){
       // $limit = implode(",",$extra['limit']);
       $sql .= " LIMIT {$extra['limit']}";
}
  return $sql;
}
}
$object = new builder();
//   $sql= $object-> select('ccc_product', '*');  true
  // $sql = $object->select('ccc_product', ['*']);
// $sql= $object -> select('ccc_product','*');
// $sql = $object -> select('ccc_product',['*'] ,["where" => ['Product_id' => 7]]);
// echo $sql;


//-------------second class for execution and fetch method------------------

class trial{
    public function execution($conn,$sql){

        
        $result=mysqli_query($conn,$sql);
        
        if($result){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function fetch($conn,$sql){
        $data=[];

        $result=mysqli_query($conn,$sql);
    
        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                $data[]=$row;
            }
        }
        return $data;
    }
}



?>