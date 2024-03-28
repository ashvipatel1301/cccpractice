<?php
class Status_Model_Status extends Core_Model_Abstract{
    public function getStatus(){
        $mapping = [ 'select'=>'select', 'In-Transit'=>'In Transit','Order-Placed'=>'Order Placed','Shifted'=>'Shifted','Cancelled'=>'Cancelled','Declined'=>'Declined','Refundeed'=>'Refundeed'];
        return $mapping;
    }
}