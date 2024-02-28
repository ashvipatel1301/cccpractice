<?php
class Customer_Controller_Account extends Core_Controller_Front_Action
{
    // protected $_loginRequiredAction = [
    //     'dashboard'
    // ];
    public function init(){
       
        // $action = $this->getRequest()->getActionName();
        // if(in_array($action,$this->_loginRequiredAction)){
        //     $customerID = Mage::getSingleton('core/session')->get('logged_in_customer_id');
        //     if()

    }
    public function registerAction()
    { 
            // echo 2323;
            $layout = $this->getLayout();

            $layout->getChild('head')->addJs('js/page.js');


            $customerFormCss = Mage::getBaseUrl() . 'skin/css/product/customerform.css';
            $layout->getChild('head')->addCss($customerFormCss);

            $child = $layout->getChild('content');
           
            $customerForm = $layout->createBlock('customer/form');//->setTemplate('product/form.phtml');
            
            $child->addChild('form', $customerForm);
          
            $layout->toHtml();
        }
        public function saveAction(){
            // echo 23;
            $data = $this->getRequest()->getParams('cdata');   //getrequest aetle request no obj and aena par params method cll karai
            echo "<pre>";   //anathi proper line ma array ma avase
            print_r($data);  //return form data 
            $productData = Mage::getModel('customer/customer');
            // print_r($productData);
            $productData->setData($data);
             print_r($productData->getData());  //return data
            $productData->save();
        die;
    }
    public function deleteAction()
    {
            $productModel = Mage::getModel('customer/customer')
            ->load($this->getRequest()->getParams('id', 0))  // this will return data which  thid id
            ->delete();
    }
    public function loginAction(){
        $session = Mage::getSingleton('core/session');
        $layout = $this->getLayout();
        $loginCss = Mage::getBaseUrl() . 'skin/css/product/loginpage.css';
        $layout->getChild('head')->addCss($loginCss);

        $child = $layout->getChild('content');
       
        $loginForm = $layout->createBlock('customer/login');//->setTemplate('product/form.phtml');
        
        $child->addChild('login', $loginForm);
      
        $layout->toHtml();

        try{
            if(!$this->getRequest()->isPost()){
                throw new Exception('Request is not valid');
        }
        $postData = $this->getRequest()->getParams('cdata');
        // print_r($postData);
        $email = $postData['customer_email'];
        $password = $postData['password'];
        $data = Mage::getModel("customer/customer")->getCollection()
        ->addFieldToFilter("customer_email", $email)
        ->addFieldToFilter("password", $password);
        // print_r($data->getData());

        $count=0;
        $customerId=0;
        foreach($data->getData() as $d){
            $count++;
            $customerId = $d->getId();
        }
        // echo $customerId;
        if($count){
            echo "great!...You logged in";
            $session->set("logged_in_customer_id",$customerId);
            // print_r($_SESSION);
        }else{
            echo "session destroyed";
            session_destroy();
    }
    }
        catch(Exception $e){
            echo $e->getMessage();
        }
        
        
    }

public function dashboardAction(){
        // echo "dashboard";
        $customerID = Mage::getSingleton('core/session')->get('logged_in_customer_id');
        // echo  $customerID;die;
        if($customerID){
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/list.css');
        $child = $layout->getChild('content');
        $customerList =  $layout->createBlock('customer/dashboard');
        $child->addChild('customer',$customerList);
        $layout->toHtml();
        }else{
            echo "Oops..!!,you are not allow to view this page";
        }


}
}

?>