<?php
class Sales_Block_Orderplaced extends Core_Block_Template{
    // public function __construct(){
      
    //     $this->setTemplate('sales/orderplaced.phtml');
    // }
    public function getOrderDetails(){
    
        $quote= Mage::getModel('sales/quote');
        $quote->initQuote();
        $orderId = $quote->getOrderId();
    //   echo $id;
        $data = Mage::getModel('sales/order')->load($orderId);
       return $data;
    }
}