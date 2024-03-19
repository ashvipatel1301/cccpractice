<?php
class Sales_Block_Orderlist extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate('sales/orderlist.phtml');
    }
    // order id,order number
    
   
    
    public function getCustomerOrder(){
        $orderlist = Mage::getModel('sales/order')->getCollection()->getData();
        return $orderlist;
    }
    public function getOrderItem(){
        $itemData= Mage::getModel('sales/order_item')->getCollection()->getData();
        return $itemData;

    }
    public function getProductItem(){
        $productlist = Mage::getModel('catalog/product')->getCollection()->getData();
        return $productlist;

    }
    
    
}
