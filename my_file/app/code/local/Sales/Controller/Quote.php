<?php
class Sales_Controller_Quote extends Core_Controller_Front_Action{
    public function addAction(){
        $data = $this->getRequest()->getParams('qdata');
        
        echo "<pre>";
        print_r($data);  //Array ( [product_id] => 2 [quantity] => 1 )
        Mage::getSingleton("sales/quote")->addProduct($data);
    
        



    }
}