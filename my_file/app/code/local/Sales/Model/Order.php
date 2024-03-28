<?php
class Sales_Model_Order extends Core_Model_Abstract{
    public function init(){
        $this->_modelClass = "sales/order";
        $this->resourceClass = "Sales_Model_Resource_Order";
        $this->collectionClass = "Sales_Model_Resource_Collection_Order";
    }
    public function _beforeSave(){
        $prefix = 'ABC';
        $sequentialNumber = sizeof(Mage::getModel('sales/order')->getCollection()->getData()) + 1;
        $this->addData('order_number', $prefix . $sequentialNumber);
    }
    //aa functions for admin order details batava Sales_Block_Admin_Order_Details
    public function getItemCollection()
    {
        return Mage::getModel('sales/order_item')
            ->getCollection()
            ->addFieldToFilter('order_id',$this->getId());
    }

    public function getCustomerAddresses()
    {
        return Mage::getModel('sales/order_customer')
            ->getCollection()
            ->addFieldToFilter('order_id',$this->getId())->getFirstItem();
    }
    public function getShipping()
    {
        return Mage::getModel('sales/order_shippingmethod')
            ->getCollection()
            ->addFieldToFilter('order_id',$this->getId())->getFirstItem();
    }

    public function getPayment()
    {
        return Mage::getModel('sales/order_paymentmethod')
            ->getCollection()
            ->addFieldToFilter('order_id',$this->getId())->getFirstItem();   
    }

    public function getStatusHistory()
    {
        return Mage::getModel('sales/order_status_history')
            ->getCollection()
            ->addFieldToFilter('order_id',$this->getId());
    }
 


    }
