<?php
class Customer_Model_Resource_Address extends Core_Model_Resource_Abstract{
    public function init(){
        $this->_tableName = 'customer_address';
        $this->_primaryKey = 'address_id';
    }
}