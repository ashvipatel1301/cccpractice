<?php
class Chatting_Controller_Account extends Core_Controller_Front_Action{
        public function formAction(){
            $layout = $this->getLayout();
            $child = $layout->getChild('content');
            $customerFormCss = Mage::getBaseUrl() . 'skin/css/product/customerform.css';
            $layout->getChild('head')->addCss($customerFormCss);
            $chattingForm = $layout->createBlock('chatting/form');
            $child->addChild('form',$chattingForm);
            $layout->toHtml();
        
    }
    public function addAction(){
        $data = $this->getRequest()->getParams();
        echo "<pre>";
        print_r($data);
        Mage::getModel('chatting/chatting')->addData($data);

    }
    public function saveAction(){
        $data = $this->getRequest()->getParams('cdata');
        echo "<pre>";
        print_r($data);
        $chattingData =Mage::getModel('chatting/chatting');
        // $sessionId = Mage::getSingleton('core/session')->get('id');
        // $session = (!$sessionId) ? 0 :$sessionId;
        // $this->load($sessionId);
        // if(!$this->$getId){

        // }
        
        $chattingData->setData($data);
        print_r($chattingData->getData());
        // $chattingData->save();
    }
    public function listAction(){
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $listForm = $layout->createBlock('chatting/list');
        $child->addChild('form',$listForm);
            $layout->toHtml();



    }
}