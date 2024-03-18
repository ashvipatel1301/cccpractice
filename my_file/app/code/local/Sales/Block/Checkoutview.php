<?php
class Sales_Block_Checkoutview extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('sales/checkoutview.phtml');
    }
    public function getCustomer()
    {
        $customerId = Mage::getSingleton('core/session')->get("logged_in_customer_id");
        // echo $customerId;

        $customerData = Mage::getModel('customer/address')->getCollection()->addFieldToFilter('customer_id', $customerId);
        // print_r($customerData);
        return $customerData;

    }

}