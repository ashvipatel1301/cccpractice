<?php

class Cityuser_Model_User extends Core_Model_Abstract{
    public function init(){
        $this->resourceClass = "Cityuser_Model_Resource_User";
        $this->collectionClass = "Cityuser_Model_Resource_Collection_User";
        $this->_modelClass = "cityuser/user";
    }   
}