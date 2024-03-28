<?php
class Sales_Model_Order_Status_History extends Core_Model_Abstract{
    public function init(){
        $this->_modelClass='sales/order_status_history';
        $this->resourceClass='Sales_Model_Resource_Order_Status_History';
        $this->collectionClass = 'Sales_Model_Resource_Collection_Order_Status_History';
    }
    public function _beforeSave(){
        // echo 456;
        $orderData= $this->getHistoryData();
        // print_r($orderData);die;
        // print_r($orderData);die;
        
        if($orderData){
           
            $to_status = $orderData->getToStatus();
            $this->addData('from_status',$to_status);

        }else{
            $defult='placeOrder';
            $this->addData('from_status',$defult);
        }
        $this->addData('action_by','admin');
       
}
//return last row from status history table
public function getHistoryData(){
    return Mage::getModel('sales/order_status_history')
    ->getCollection()
    ->addFieldToFilter('order_id',$this->getOrderId())
    ->getOrderByToFilter('history_id DESC')
->getFirstItem();

   }
   
}