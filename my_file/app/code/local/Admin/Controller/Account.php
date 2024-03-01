<?php
class Admin_Controller_Account extends Core_Controller_Admin_Action{

    protected $_allowAction = ["login"];
    public function loginAction(){
        if(!$this->getRequest()->isPost()){
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/loginpage.css');//login ni j css che
        $child = $layout->getChild('content');
        $adminList =  $layout->createBlock('admin/login');
        $child->addChild('customer',$adminList);
        $layout->toHtml();
        }
        else{
            try{
                $postData = $this->getRequest()->getParams('adata');
                $adminEmail = $postData['admin_email'];
                $adminPassword = $postData['admin_password'];
                if($adminEmail == Admin_Model_User::USERNAME && $adminPassword == Admin_Model_User::PASSWORD){
                    Mage::getSingleton('core/session')->set("admin_login_id",$adminEmail);
                    $this->setRedirect('admin/catalog_product/list');
                }else{
                    echo "wrong Credential....!";
                    Mage::getSingleton('core/session')->remove("admin_login_id");
                }
            
            
            }catch(Exception $e){
                var_dump($e->getMessage());

            }
        }
    }
}
?>