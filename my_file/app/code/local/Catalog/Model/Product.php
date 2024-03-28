<?php

class Catalog_Model_Product extends Core_Model_Abstract{
    public function init(){
        $this->resourceClass = "Catalog_Model_Resource_Product";
        $this->collectionClass = "Catalog_Model_Resource_Collection_Product";
        $this->_modelClass = "catalog/product";
    }   
    protected function _beforeSave()
    {
        if(!isset($this->_data['created_at']) || $this->_data['created_at']== "")
        {
            $this->_data['created_at'] = '2015-01-01';
        }
        $this->_data['updated_at'] = date('Y-m-d H:i:s');
        return $this;
    }
    public function getStatus() {
        $mapping = [1=>'E',0=>'D'];
        if(isset($this->_data['status'])){
            return $mapping[$this->_data['status']];
        }
    }
    // public function getCategoryId()
    // {
    //     $mapping=[1=>'Tops', 2=>'T-shirts',3=>'Jeans',4=>'Shirts',5=>'Kurtas',6=>'Chaniya Choli',7=>'Wedding Lahengas',8=>'Ethnic Dresses',9=>'Western Dresses',10=>'Trousers',11=>'Active Wear',12=>'Winter Wear',13=>'Formal Wear',14=>'Jump Suits',15=>'Party Wear',16=>'Pajamas'];
    //     if(isset($this->_data['category_id']))
    //     {
    //         return $mapping[$this->_data['category_id']];
    //     }
    // }

}