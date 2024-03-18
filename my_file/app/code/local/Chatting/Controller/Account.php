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
   
    public function saveAction(){
        echo "sdf";
        $data = $this->getRequest()->getParams('cdata');
        
        echo "<pre>";
        print_r($data);
        // $data = array_merge($data,['to_user'=>NULL]);
       $chattingData =Mage::getModel('chatting/chatting')->setData($data)->save();
      
        // Mage::getModel('core/session')->set('to_user',$data['from_user']);
        
        print_r($chattingData);
        // $chattingData->save();
    }
    public function listAction(){
        // echo "list action called";
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $listForm = $layout->createBlock('chatting/list');
        $child->addChild('form',$listForm);
            $layout->toHtml();



    }
}