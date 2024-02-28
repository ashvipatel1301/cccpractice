<?php
class Catalog_Block_Admin_Product_List extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate('catalog/admin/product/list.phtml');
       
    }
    public function getProduct(){
        // return Mage::getModel('catalog/product')->load($this->getRequest()->getParams('id',0));

    }
    public function getCollection()
    {
        
        return Mage::getModel('catalog/product')->getCollection();
    }
    
}