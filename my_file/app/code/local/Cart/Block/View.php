<?php
class Cart_Block_View extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate('cart/cartview.phtml');

    }
    public function getCartData(){
        // return Mage::getModel('sales/quote')->getCollection();

    }
}