<?php
class Import_Model_Import extends Core_Model_Abstract{
    public function init(){
        $this->_modelClass = 'import/import';
        $this->resourceClass='Import_Model_Resource_Import';
        $this->collectionClass='Import_Model_Resource_Collection_Import';
    }
}