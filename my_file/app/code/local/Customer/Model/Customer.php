<?php
class Customer_Model_Customer extends Core_Model_Abstract{
    public function init(){
        $this->resourceClass = "Customer_Model_Resource_Customer";
        $this->collectionClass = "Customer_Model_Resource_Collection_Customer";
        $this->_modelClass = "customer/customer";
    }   
   
}
?>