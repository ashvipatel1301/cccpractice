<?php
class Catalog_Controller_Product extends Core_Controller_Front_Action{
    // public function viewAction(){
    //     $layout = $this->getLayout();
        
    //     $child= $layout->getChild('content');
    //     $productView=$layout->createBlock('catalog/product_view');
    //     $child->addChild('view',$productView);
    //     $layout->toHtml();

    // }
    public function viewAction()
   {
      $layout=$this->getLayout();
      $child=$layout->getChild('content');

      $id=$this->getRequest()->getParams('id');
      if(isset($id) && !empty($id))
      {
         $layout->getChild('head')->addCss(Mage::getBaseUrl().'skin/css/product/view.css');
         $viewproduct=$layout->createBlock('catalog/product_view');
         $child->addChild('viewproduct', $viewproduct);
      }
      else
      {
         $layout->getChild('head')->addCss(Mage::getBaseUrl().'skin/css/product/list.css');
         $list=$layout->createBlock('catalog/product_list');
         $child->addChild('productlist', $list);
      }
      $layout->toHtml();
   } 

}