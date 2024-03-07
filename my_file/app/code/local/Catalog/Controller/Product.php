<?php
class Catalog_Controller_Product extends Core_Controller_Front_Action{
    public function viewAction(){
        $layout = $this->getLayout();
        
        $child= $layout->getChild('content');
        $productView=$layout->createBlock('catalog/product_view');
        $child->addChild('view',$productView);
        $layout->toHtml();

    }
}