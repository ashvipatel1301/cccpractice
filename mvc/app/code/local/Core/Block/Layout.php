<?php
class Core_Block_Layout extends Core_Block_Template{
   
    public function __construct(){
        $this->setTemplate('core/1column.phtml');
        // return $this;
        $this->prepareChildren();
    
    }
    public function prepareChildren(){
            $head=$this->createBlock('page/head');
            $this->addChild('head',$head);

            $header=$this->createBlock('page/header');
            $this->addChild('header',$header);

            $content= $this->createBlock('page/content');
            $this->addChild('content',$content);

            $footer=$this->createBlock('page/footer');
            $this->addChild('footer',$footer);
    }
    public function createBlock($className){  //aek block no object kari and tya return karavannu
        return Mage::getBlock($className);
    }


}


?>