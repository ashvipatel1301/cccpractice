<?php

class Catalog_Model_Product extends Core_Model_Abstract{
    public function init(){
        $this->resourceClass = "Catalog_Model_Resource_Product";
        $this->collectionClass = "Catalog_Model_Resource_Collection_Product";
        $this->_modelClass = "catalog/product";
    }   
    protected function _beforeSave()
    {
        // echo "In beforeload";
        if(!isset($this->_data['created_at']))
        {
            if($this->_data['created_at'] == NULL)
            {
                $this->_data['created_at']='2016-12-12';
            }
        }
        $this->_data['upadted_at']='2016-12-10';
    }
    public function getStatus() {
        $mapping = [1=>'E',0=>'D'];
        if(isset($this->_data['status'])){
            return $mapping[$this->_data['status']];
        }
    }
    // public function getCategoryId()
    // {
    //     $mapping=[1=> 'Bar & Game Room', 2=> 'BedRoom',3=> 'Decor',4=>'Dining & Kitchen',5=> 'Lighting',6=> 'Living Room' , 7=>'Mattresses',8=>'Office',9=>'Outdoor'];
    //     if(isset($this->_data['category_id']))
    //     {
    //         // return $mapping[$this->_data['category_id']];
    //     }
    // }

}