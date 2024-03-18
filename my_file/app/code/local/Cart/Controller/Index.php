<?php
class Cart_Controller_Index extends Core_Controller_Front_Action{
    public function viewAction(){
        $layout = $this->getLayout();
        
        $child = $layout->getChild('content');
        $cartView = $layout->createBlock('cart/view');
        $child->addChild('view',$cartView);
        $layout->toHtml();

    }
    
}