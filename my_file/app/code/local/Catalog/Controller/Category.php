<?php
class Catalog_Controller_Category extends Core_Controller_Front_Action{
    public function viewAction(){
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $categoryView = $layout->createBlock('catalog/category_view');
        $child->addChild('view',$categoryView);
        $layout->toHtml();
    }
    
}