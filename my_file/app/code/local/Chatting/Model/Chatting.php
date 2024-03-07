<?php
class Chatting_Model_Chatting extends Core_Model_Abstract{
    public function init(){
        $this->resourceClass = "Chatting_Model_Resource_Chatting";
        $this->collectionClass = "Chatting_Model_Resource_Collection_Chatting";
        $this->_modelClass = "chatting/chatting";
    }
    public function initData(){
        $id=Mage::getModel("chatting/chatting");
        $id=Mage::getSingleton('core/session')->getId();
        $id = (!$id) ? 0 :$id;
        if(!$this->getId()){
            $sessionId=Mage::getModel('chatting/chatting')
            ->setData([
                'from_user'=>null,
                'to_user'=>null

            ])->save;
            Mage::getSingleton('core/session')->set("session_id",$sessionId->getId());
            $this->load($sessionId->getId());
            
        }

    }
    public function addChattingData($data){
        $this->initData();
        print_r($this);
        if($this->getId()){
            Mage::getModel('chatting/chatting');
            $this->save();

        }

    }
}