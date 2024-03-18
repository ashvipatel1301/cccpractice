<?php

class Chatting_Block_List extends Core_Block_Template
{
    public function __construct()
    {
        // echo "34";die;
        $this->setTemplate('chatting/list.phtml');
    }
    public function getCollection()
    {
        
        return Mage::getModel('chatting/chatting')->getCollection()->load("id",0);
    }

}