<?php
class Sales_Model_Order_Shippingmethod extends Core_Model_Abstract{
    public function init(){
        $this->_modelClass = "sales/order_shippingmethod";
        $this->resourceClass = "Sales_Model_Resource_Order_Shippingmethod";
        $this->collectionClass = "Sales_Model_Resource_Collection_Order_Shippingmethod";
    }
}