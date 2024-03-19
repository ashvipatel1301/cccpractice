<?php
class Admin_Controller_Order extends Core_Controller_Front_Action{
    public function listAction(){
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $orderList = $layout->createBlock('sales/orderlist');
        $child->addChild('bannerList', $orderList);
        $layout->toHtml();
    }
}