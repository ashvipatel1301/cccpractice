<?php 
class Customer_Block_Dashboard extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate('customer/dashboard.phtml');
    }
    public function getCustomer(){
        return Mage::getModel('customer/customer')->load($this->getRequest()->getParams('id',0));
    }
    public function getCustomerData(){
        $customerID = Mage::getSingleton('core/session')->get('logged_in_customer_id');
        
        // echo $customerID;
        return Mage::getModel('customer/customer')->load($customerID);
    }

}
?>