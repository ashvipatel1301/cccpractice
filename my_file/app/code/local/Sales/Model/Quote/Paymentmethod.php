<?php
class Sales_Model_Quote_Paymentmethod extends Core_Model_Abstract{
    public function init(){
        $this->_modelClass = 'sales/quote/paymentmethod';
        $this->resourceClass="Sales_Model_Resource_Quote_Paymentmethod";
        $this->collectionClass = "Sales_Model_Resource_Collection_Quote_Paymentmethod";
    }
    public function _beforeSave(){
        $quoteId = Mage::getSingleton('core/session')->get('quote_id');
        $this->addData('quote_id',$quoteId);
    }
}