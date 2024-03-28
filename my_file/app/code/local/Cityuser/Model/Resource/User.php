<?php
class Cityuser_Model_Resource_User extends Core_Model_Resource_Abstract{
    public function init(){
        $this->_tableName = 'ccc_user';
        $this->_primaryKey='id';
    }
}