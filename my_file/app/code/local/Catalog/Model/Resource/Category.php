<?php
class Catalog_Model_Resource_Category extends Core_Model_Resource_Abstract{
    public function init(){
        $this->_tableName = 'catalog_category';
        $this->_primaryKey = 'category_id';
    }
    
}