<?php
class Cityuser_Model_Resource_City extends Core_Model_Resource_Abstract{
    public function init(){
        $this->_tableName = 'ccc_city';
        $this->_primaryKey='id';
    }
}