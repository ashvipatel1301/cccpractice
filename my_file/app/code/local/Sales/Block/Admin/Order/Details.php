<?php 
class Sales_Block_Admin_Order_Details extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate('sales/admin/order/details.phtml');
    }
    public function getOrderItems()
    {
        $orderId=$this->getRequest()->getParams('id');
        $customerData = Mage::getModel('sales/order')->load($orderId);
        return $customerData->getItemCollection();
    }
    // fetches customer details from customer table
    public function getCustomerDetails()
    {
        $customerId=Mage::getSingleton('core/session')->get('logged_in_customer_id');
       
         return Mage::getModel('customer/customer')->load($customerId);
    }
    public function getAddresses()
    {
        $orderId=$this->getRequest()->getParams('id');
        $orderModel= Mage::getModel('sales/order')->load($orderId);
        // print_r($orderModel);die;
        return $orderModel->getCustomerAddresses(); //method in order.php retrives data from sales_order_customer
    }
    public function getShipping()
    {
        $orderId=$this->getRequest()->getParams('id');
        $orderModel= Mage::getModel('sales/order')->load($orderId);
        return $orderModel->getShipping();
    } 
    public function getPayment()
    {
        $orderId=$this->getRequest()->getParams('id');
        $orderModel= Mage::getModel('sales/order')->load($orderId);
        return $orderModel->getPayment();
    }
    public function getStatusHistory()
    {
        $orderId=$this->getRequest()->getParams('id');
        $orderModel= Mage::getModel('sales/order')->load($orderId);
        return $orderModel->getStatusHistory();
    }
}