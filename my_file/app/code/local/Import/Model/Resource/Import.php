<?php
class Import_Model_Resource_Import extends Core_Model_Resource_Abstract{
    public function init(){
        $this->_tableName = 'import';
        $this->_primaryKey = 'import_id';
    }
}