<?php
class Sales_Model_Resource_Quote_Paymentmethod extends Core_Model_Resource_Abstract{
    public function init(){
        $this->_tableName = "sales_quote_payment_method";
        $this->_primaryKey = "payment_id";
    }
}