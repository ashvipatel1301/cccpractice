<?php
class Banner_Model_Banner extends Core_Model_Abstract{
    public function init(){
        $this->resourceClass = "Banner_Model_Resource_Banner";
        $this->collectionClass = "Banner_Model_Resource_Collection_Banner";
        $this->_modelClass = "banner/banner";
    }   
    public function getStatus() {
        $mapping = [1=>'E',0=>'D'];
        if(isset($this->_data['status'])){
            return $mapping[$this->_data['status']];
        }
    }
    
    public function getShowOn(){
        $mapping=[0=>'Home Page', 1=> 'Cart Page', 2=> 'Checkout Page'];
        if(isset($this->_data['show_on'])){
            return $mapping[$this->_data['show_on']];
        }

    }
    
}