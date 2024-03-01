<?php
class Catalog_Controller_Product extends Core_Controller_Front_Action{
    public function listAction(){
        $layout = $this->getLayout();
        // $layout->getChild('content');
        $child= $layout->getChild('content');
        $productList=$layout->createBlock('catalog/list');
        $child->addChild('list',$productList);
        $layout->toHtml();

    }
    public function viewAction(){
        $layout = $this->getLayout();
        
        $child= $layout->getChild('content');
        $productView=$layout->createBlock('catalog/view');
        $child->addChild('list',$productView);
        $layout->toHtml();

    }
}