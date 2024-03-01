<?php
class Admin_Controller_Catalog_Product extends Core_Controller_Admin_Action
{
    protected $_allowAction = [];
    public function formAction()
    {
       
        
        $layout = $this->getLayout();

        $layout->getChild('head')->addJs('js/page.js');
        $layout->getChild('head')->addJs('js/head.js');
        // $layout->getChild('head')->addCss('../../app/design/frontend/tempalate/product/css/product.css');
        $productFormCss = Mage::getBaseUrl() . 'skin/css/product/form.css';
        $layout->getChild('head')->addCss($productFormCss);

        $child = $layout->getChild('content');
        // print_r($child);
        // $productForm=$layout->createBlock('core/template')->setTemplate('product/form.phtml');
        $productForm = $layout->createBlock('catalog/admin_product_form');//->setTemplate('product/form.phtml');
        // print_r($productForm);die();
        $child->addChild('form', $productForm);
        // print_r($child);//die();
        $layout->toHtml();


    }
    public function deleteAction()
    {
        // $id = $this->getRequest()->getParams('id',0);
        // echo $id;
        $productModel = Mage::getModel('catalog/product')
            ->load($this->getRequest()->getParams('id', 0))  // this will return data which  thid id
            ->delete();
        // $productModel->delete($id);  

    }
    public function listAction()
    {
        $layout = $this->getLayout();
        
        //$layout->getChild('head')->addJs('js/page.js');
        // $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/list.css');

        $child = $layout->getChild('content');
        $productList =  $layout->createBlock('catalog/admin_product_list');
        $child->addChild('productList',$productList);
        $layout->toHtml();
       
        
    }
    
    public function saveAction()
    {
        // echo 2323;
    //$data = $this->getRequest()->getParams('pdata');   //getrequest aetle request no obj and aena par params method cll karai
        // echo "<pre>";   //anathi proper line ma array ma avase
        // print_r($data);  //return form data 

        //aa data ae database ma submit karavano che soo save fun jose 
    //$productData = Mage::getModel('catalog/product');
        // print_r($productData);
    //$productData->setData($data);
        // print_r($productData->getData());  //return data
    //$productData->save();
        
        // die;
         try{
            if(!$this->getRequest()->isPost()){
                throw new Exception("request is not Valid");
            }
            echo "<pre>";
            $data = $this->getRequest()->getParams('pdata');
            if(!isset($data['price']) || !is_numeric($data['price']))
            {
                throw new Exception("price must be in numeric");
            }
            }
        catch(Exception $e){
            var_dump($e->getMessage());
        }
        $productModel = Mage::getModel("catalog/product");
        $productModel->setData($data)->save();
    
        
    }

    }
?>