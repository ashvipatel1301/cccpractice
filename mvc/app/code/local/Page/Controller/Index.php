<?php
class Page_Controller_Index extends Core_Controller_Front_Action
{
  public function indexAction()
  { //responsiblity is render whole html
    // echo 2323;
    $layout = $this->getLayout();     //return object of Core_Block_layout
    // print_r($layout);die;
    // echo dirname(__FILE__);
    $layout->getChild('head')->addJs('js/page.js');
    $layout->getChild('head')->addJs('js/head.js');
    $layout->getChild('head')->addCss('css/page.css');

    $child = $layout->getChild('content');
    $banner = $layout->createBlock('core/template')->setTemplate('banner/banner.phtml');
    ;
    $child->addChild('banner', $banner);
    
    $layout->toHtml();
    // print_r($layout);


  }

}


?>