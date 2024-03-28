<?php
class Sales_Block_Orderlist extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate('sales/orderlist.phtml');
    }
    public function getStatusModel(){
       return  Mage::getModel('status/status')->getStatus();
    }
    
   
    // order id,order number
    public function getCustomerOrder(){
        return Mage::getModel('sales/order')->getCollection()->getData();
        
    }
    

    
    
}
