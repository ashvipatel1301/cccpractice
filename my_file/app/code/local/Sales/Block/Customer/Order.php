<?php
class Sales_Block_Customer_Order extends Core_Block_Template{
    public function __construct(){
      
        $this->setTemplate('sales/customer/order.phtml');

    } 
    public function getOrder(){
        $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id');
        return Mage::getModel('sales/order')->getCollection()->addFieldToFilter('customer_id',$customerId);
    }
}