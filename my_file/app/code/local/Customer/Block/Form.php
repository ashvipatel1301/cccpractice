<?php
class Customer_Block_Form extends Core_Block_Template{
    public function __construct(){
        // echo 11;
        $this->setTemplate('customer/form.phtml');
    }
    public function getCustomer(){
        return Mage::getModel('customer/customer')->load($this->getRequest()->getParams('id',0));
    }
}

?>  