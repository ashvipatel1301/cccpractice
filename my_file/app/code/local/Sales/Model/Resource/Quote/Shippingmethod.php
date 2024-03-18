<?php
class Sales_Model_Resource_Quote_Shippingmethod extends Core_Model_Resource_Abstract{
    public function init(){
        $this->_tableName = "sales_quote_shipping_method";
        $this->_primaryKey = "shipping_id";
    }
}