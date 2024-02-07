<?php
class builder{
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
//  $sql= $object-> select('ccc_product', '*');  true
  // $sql = $object->select('ccc_product', ['*']);
// $sql= $object -> select('ccc_product','*');
$sql = $object -> select('ccc_product',['*'] ,["where" => ['Product_id' => 7]]);

echo $sql;



?>