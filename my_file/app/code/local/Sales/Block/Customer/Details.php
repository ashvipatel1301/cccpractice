<?php
class Sales_Block_Customer_Details extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate('sales/customer/details.phtml');
    }
    public function getOrderItems(){
        $orderId = $this->getRequest()->getParams('id');
        return Mage::getModel('sales/order_item')->getCollection()->addFieldToFilter('order_id',$orderId);
    }
    public function getAddress(){
        
        $customerID = Mage::getSingleton('core/session')->get('logged_in_customer_id');
        
        // echo $customerID;
        return Mage::getModel('customer/customer')->load($customerID);
    }
}