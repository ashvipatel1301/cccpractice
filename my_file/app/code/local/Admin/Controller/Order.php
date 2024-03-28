<?php
class Admin_Controller_Order extends Core_Controller_Admin_Action
{ 
    protected $_allowAction = ["login"];
    //order list admin side print karava
    public function listAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $orderList = $layout->createBlock('sales/orderlist');
        $child->addChild('bannerList', $orderList);
        $layout->toHtml();
    }
    // status sales/order table ma save thse
    public function saveAction(){
        $statusData = $this->getRequest()->getParams('statusdata');
        $orderid = $this->getRequest()->getParams('id');
      
       $status = $statusData['status'];
       
        // Mage::getSingleton('sales/order')
        // ->addData('order_id',$orderid)
        // ->addData('status',$status)
        // ->save();

        $historyModel = Mage::getModel('sales/order_status_history')
       
        ->setData([
            'to_status' => $status,
            'order_id' =>$orderid
        ])
        ->save();
        Mage::getSingleton('sales/order')->addData('order_id',$historyModel->getOrderId())->addData('status',$historyModel->getToStatus())->save();
        $this->setRedirect('admin/order/list');
    }
    //admin order list batavava with view action with all detail customer order detail 
    public function viewAction(){
       
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $orderDetailList = $layout->createBlock('sales/admin_order_details');
        $child->addChild('orderDetailList', $orderDetailList);
        $layout->toHtml();

    }
}