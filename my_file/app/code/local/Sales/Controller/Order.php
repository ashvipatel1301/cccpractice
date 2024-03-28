<?php
class Sales_Controller_Order extends Core_Controller_Front_Action{
    //customer order list mate
    public function listAction(){
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $customerOrderView = $layout->createBlock('sales/customer_order');
        $child->addChild('customerOrderView', $customerOrderView);
        $layout->toHtml();
    }
    //after clicking on sales/order/list ma button che ema then detailed view of order show thse
    public function detailsAction(){
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $customerdetailsOrderView = $layout->createBlock('sales/customer_details');
        $child->addChild('customerdetailsOrderView', $customerdetailsOrderView);
        $layout->toHtml();

    }
}