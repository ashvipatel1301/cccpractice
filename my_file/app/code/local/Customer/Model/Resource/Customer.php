<?php
class Customer_Model_Resource_Customer extends Core_Model_Resource_Abstract
{
 
   
    public function init(){
        $this->_tableName = 'customer';
        $this->_primaryKey = 'customer_id';

    }
    
}

    


