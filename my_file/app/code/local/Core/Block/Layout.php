<?php

class Core_Block_Layout extends Core_Block_Template{
    //teplate class ni copy ahiya ready thse as ae parent class che so apade
    //layout na object per toHtml method call karavi sakie chie

    public function __construct(){
        $this->setTemplate('core/1column.phtml');
        // print_r($this);
        $this->prepareChildren();
    }

    public function prepareChildren(){
        $head = $this->createBlock('page/head');
        $this->addChild('head',$head);
           
        $header = $this->createBlock('page/header');  // object of page_block_head
        $this->addChild('header', $header);

        $content = $this->createBlock('page/content');
        $this->addChild('content',$content);

        $footer = $this->createBlock('page/footer');
        $this->addChild('footer',$footer);
    }
    public function createBlock($className){
        return Mage::getBlock($className);
    }
    
}