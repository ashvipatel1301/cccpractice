<?php
class Core_Model_Resource_Abstract{
    protected $_tableName = null;
    protected $_primaryKey = null;
    public function getPrimaryKey(){
        return $this->_primaryKey;
    }
    public function getTableName(){
        return $this->_tableName;
    }
    public function getAdapter(){
        return new Core_Model_DB_Adapter;
    }
    public function load($id,$column= null){
        
        $sql ="SELECT * FROM {$this->_tableName} WHERE {$this->_primaryKey}={$id} LIMIT 1";
        // echo $sql;
        $adapter = $this->getAdapter();
        $result = $adapter->fetchRow($sql);
        // print_r($result);
        return $result;
    }
    public function save(Catalog_Model_Product $product){
        echo 55;
        // print_r($product->getData());
        $data = $product->getData();
        // print_r($data);
        if(isset ($data[($this->getPrimaryKey())])){
            unset($data[$this->getPrimaryKey()]);
        }
        // print_r($data);   //id jati rese

        $sql = $this->insertSql($this->getTableName(),$data);// create a query 
        echo $sql;
        $id = $this->getAdapter()->insert($sql);
        $product->setId($id);
        Print_r($product);

    }
    public function insertSql($tableName,$data){    

        $column = $value = [];
    
        foreach($data as $_key => $_value){
    
            $column[]= "`{$_key}`";   
            $values[]= "'".addslashes($_value)."'";    
        }                                     
        $columns = implode(",",$column);   
        $values = implode(",",$values);
    
    
      return "INSERT INTO {$tableName}({$columns}) VALUES ({$values})";
    }

}