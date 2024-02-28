<?php
class Core_Model_Resource_Abstract
{
    protected $_tableName = null;
    protected $_primaryKey = null;
    public function getPrimaryKey()
    {
        return $this->_primaryKey;
    }
    public function getTableName()
    {
        return $this->_tableName;
    }
    public function getAdapter()
    {
        return new Core_Model_DB_Adapter;
    }
    public function load($id, $column = null)
    {

        $sql = "SELECT * FROM {$this->_tableName} WHERE {$this->_primaryKey}={$id} LIMIT 1";
        // echo $sql;
        $adapter = $this->getAdapter();
        $result = $adapter->fetchRow($sql);
        // print_r($result);
        return $result;
    }
    public function save(Catalog_Model_Product $product)
    {
        echo 55;
        // print_r($product->getData());
        $data = $product->getData();
        // print_r($data);
        if (isset($data[$this->getPrimaryKey()]) && !empty($data[$this->getPrimaryKey()])) {
            // echo "update";
            unset($data[$this->getPrimaryKey()]);
            $sql = $this->updateSql($this->getTableName(), $data, [$this->getPrimaryKey() => $product->getId()]);
            $this->getAdapter()->update($sql);

        } else {
            // echo "insert";
            $sql = $this->insertSql($this->getTableName(), $data);
            $id = $this->getAdapter()->insert($sql);
            $product->setId($id);
            print_r($product);   //return inserted data with in which id 

        }

    }

    public function updateSql($tableName, $data, $where)
    {
        $column = $wherecond = [];
        foreach ($data as $_key => $_value) {
            $set_cond[] = "`{$_key}` = " . "'" . addslashes($_value) . "'";
        }
        $column = implode(",", $set_cond);

        foreach ($where as $_key => $_value) {
            $wherecond[] = "`{$_key}` = " . "'" . addslashes($_value) . "'";
        }
        // print_r($wherecond);
        $wherecond = implode(" AND ", $wherecond);


        return "UPDATE {$tableName} SET {$column} WHERE {$wherecond}";   //update tablename set col-val where condition;

    }
    public function insertSql($tableName, $data)
    {

        $column = $value = [];

        foreach ($data as $_key => $_value) {

            $column[] = "`{$_key}`";
            $values[] = "'" . addslashes($_value) . "'";
        }
        $columns = implode(",", $column);
        $values = implode(",", $values);


        return "INSERT INTO {$tableName}({$columns}) VALUES ({$values})";
    }
    public function delete(Catalog_Model_Product $product)
    {
        // print_r($product);
        echo "Final delete where query built! <br>";
        
        $sql = $this->deleteSql($this->getTableName(), [$this->getPrimaryKey() => $product->getId()]);
        echo $sql;
        $result = $this->getAdapter()->delete($sql);
        // echo $result;
    }
    public function deleteSql($tableName, $where)
    {
        $wherecond = [];
        foreach ($where as $_key => $_value) {
            $wherecond[] = "`{$_key}` = " . "'" . addslashes($_value) . "'";
        }
        // print_r($wherecond);
        $wherecond = implode(" AND ", $wherecond);

        return " DELETE FROM {$tableName} WHERE {$wherecond} ";     //DELETE FROM table_name WHERE condition;
    }
    

}