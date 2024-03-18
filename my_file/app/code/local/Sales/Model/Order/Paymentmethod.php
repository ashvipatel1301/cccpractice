<?php
class Sales_Model_Order_Paymentmethod extends Core_Model_Abstract{
    public function init(){
        $this->_modelClass = "sales/order_paymentmethod";
        $this->resourceClass = "Sales_Model_Resource_Order_Paymentmethod";
        $this->collectionClass = "Sales_Model_Resource_Collection_Order_Paymentmethod";
    }
}