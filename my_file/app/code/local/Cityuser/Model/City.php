<?php

class Cityuser_Model_City extends Core_Model_Abstract{
    public function init(){
        $this->resourceClass = "Cityuser_Model_Resource_City";
        $this->collectionClass = "Cityuser_Model_Resource_Collection_City";
        $this->_modelClass = "cityuser/city";
    }   
}