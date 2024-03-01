<?php
class Core_Controller_Front_Action{
    protected $_layout = null;
    public function __construct(){
        $this->init();
    }
    public function init(){
        return $this;
    }
    public function getLayout(){
        // echo 12;
        if(is_null($this->_layout)){
            $this->_layout = Mage::getBlock('core/layout');
           
        }
        return $this->_layout;

}
public function getRequest(){
    return Mage::getModel('core/request');
}
public function setRedirect($url){
    $url = Mage::getBaseUrl() . $url;
    header("Location:".$url);
}
    
}