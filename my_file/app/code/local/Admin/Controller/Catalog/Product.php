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
        try {
            echo "<pre>";
            if (!$this->getRequest()->isPost()) {
                throw new Exception("request is not valid");
            }
        $data = $this->getRequest()->getParams('pdata');
        $fileName = $_FILES['pdata']['name']['image_link'];
        $data = array_merge($data, ["image_link" => $fileName]);
            if(!isset($data['price']) || !is_numeric($data['price']))
            {
                throw new Exception("price must be in numeric");
            }
            
        $productModel = Mage::getModel("catalog/product");
        $productModel->setData($data)->save();
        print_r($productModel);

        if (isset($_FILES["pdata"]["name"])) {
            
            $e = $_FILES["pdata"]["error"]["image_link"];
            $n = $fileName;
            $t = $_FILES["pdata"]["tmp_name"]["image_link"];
            $allowed = array('jpg', 'gif', 'png', 'PNG', 'jpeg','webp');
            $ext = explode(".", $n);

            if ($e == 0) {
                if (!file_exists(Mage::getBaseDir('media/product/') . $n)) {
                    if (in_array($ext[1], $allowed)) {
                        if (move_uploaded_file($t, Mage::getBaseDir('media/product/') . $n)) {
                            echo ("file uploaded succesfully");
                        } else {
                            echo "file cannot be uploaded";
                        }
                    } else {
                        echo "this extension is not allowed";
                    }
                } else {
                    echo "file already exist";

                }
            } else {
                echo "error:" . $e;
            }
        }

    } catch (Exception $e) {
        var_dump($e->getMessage());
    }
    $this->setRedirect('admin/catalog_product/list');
}
    
}
    

    
?>