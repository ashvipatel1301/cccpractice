<?php
class Admin_Controller_Catalog_Category extends Core_Controller_Front_Action{
    
    protected $_allowAction = [];
public function formAction(){
    $layout = $this->getLayout();

    
    $productFormCss = Mage::getBaseUrl() . 'skin/css/product/form.css';
    $layout->getChild('head')->addCss($productFormCss);

    $child = $layout->getChild('content');
    
    $categoryForm = $layout->createBlock('catalog/admin_category_form');//->setTemplate('product/form.phtml');
    // print_r($productForm);die();
    $child->addChild('form', $categoryForm);
    // print_r($child);//die();
    $layout->toHtml();
}
public function saveAction(){
    $data = $this->getRequest()->getParams('catdata');
    $categoryData = Mage::getModel('catalog/category');
    $categoryData->setData($data);
    $categoryData->save();
   
}
public function deleteAction(){
    $categoryModel = Mage::getModel('catalog/category')->load($this->getRequest()->getParams('id',0))
    ->delete();
}
public function listAction(){
    $layout = $this->getLayout();
    $child = $layout->getChild('content');
    $categoryList = $layout->createBlock('catalog/admin_category_list');
    $child->addChild('categoryList',$categoryList);
    $layout->toHtml();

}
}