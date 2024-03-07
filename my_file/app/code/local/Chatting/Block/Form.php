<?php
class Chatting_Block_Form extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate('chatting/form.phtml');
    }
    public function getChattingData(){
        Mage::getModel('chatting/chatting')->load($this->getRequest()->getParams('id',0));
    }

}