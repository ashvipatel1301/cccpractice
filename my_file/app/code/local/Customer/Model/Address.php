<?php
class Customer_Model_Address extends Core_Model_Abstract{
    public function init(){
        $this->_modelClass = 'customer/address';
        $this->resourceClass = "Customer_Model_Resource_Address";
        $this->collectionClass = "Customer_Model_Resource_Collection_Address";

    }
}