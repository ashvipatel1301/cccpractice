<?php 
class Cityuser_Controller_City extends Core_Controller_Admin_Action{
    public function formAction()
    {
        
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $cityForm =  $layout->createBlock('cityuser/city');
        $child->addChild('productList',$cityForm);
        $layout->toHtml();
       
        
    }
  
}