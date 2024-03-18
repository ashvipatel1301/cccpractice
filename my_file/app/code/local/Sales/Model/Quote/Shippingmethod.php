<?php
class Sales_Model_Quote_Shippingmethod extends Core_Model_Abstract{
    public function init(){
        $this->_modelClass = 'sales/quote/shippingmethod';
        $this->resourceClass="Sales_Model_Resource_Quote_Shippingmethod";
        $this->collectionClass = "Sales_Model_Resource_Collection_Quote_Shippingmethod";
    }
    public function _beforeSave(){
        $quoteId = Mage::getSingleton('core/session')->get('quote_id');
        $this->addData('quote_id',$quoteId);
    }
}