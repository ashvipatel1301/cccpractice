<?php
class Catalog_Block_List extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate('catalog/product/list.phtml');

    }
    public function getCollection()
    {
        
        return Mage::getModel('catalog/product')->getCollection();
    }

}