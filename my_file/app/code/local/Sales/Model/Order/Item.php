<?php
class Sales_Model_Order_Item extends Core_Model_Abstract{
    protected $_product = null;
    public function init(){
        $this->_modelClass = "sales/order_item";
        $this->resourceClass = "Sales_Model_Resource_Order_Item";
        $this->collectionClass = "Sales_Model_Resource_Collection_Order_Item";
    }
    public function getProduct()
    {
        if(is_null($this->_product)) {
            $this->_product = Mage::getModel('catalog/product')->load($this->getProductId());
        }
        return $this->_product;
    }

}