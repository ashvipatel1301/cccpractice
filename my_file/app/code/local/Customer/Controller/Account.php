<?php
class Customer_Controller_Account extends Core_Controller_Front_Action
{
    protected $_loginRequiredAction = [
        'dashboard'
    ];
    public function __construct(){
        $this->init();
    }
    public function init()
    {
        
        $action=$this->getRequest()->getActionName();
        if(in_array($action,$this->_loginRequiredAction))
        {
            $customerId=Mage::getSingleton("core/session")->get("logged_in_customer_id");
            if(!$customerId)
            {
                $this->setRedirect("customer/account/login");
                // exit();
            }
        }
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
            
        //$session=Mage::getSingleton("core/session");
        if (!$this->getRequest()->isPost()) 
        {
            $layout = $this->getLayout();
            //print_r($layout);
            $layout->getChild('head')->addCss(Mage::getBaseUrl() . 'skin/css/product/loginpage.css');
            //$layout->getChild('head')->addJs(Mage::getBaseUrl() . 'ahi jquery ni cdn download karine e file skin ma js ma mukvi');
    
            $child = $layout->getChild('content');
            $loginForm = $layout->createBlock('customer/login');
            $child->addChild('loginform', $loginForm);
            //print_r($layout);
            $layout->toHtml();
        }
        else
        {
            try
            {
                $postData = $this->getRequest()->getParams('cdata');
                $email = $postData['customer_email'];
                $password = $postData['password'];
                $data = Mage::getModel("customer/customer")->getCollection()
                        ->addFieldToFilter("customer_email", $email)
                        ->addFieldToFilter("password", $password);
                // $data->getData();
               // print_r($data);
                $count = 0;
                $customerId = 0;
                foreach ($data->getData() as $d) 
                {
                    $count++;
                    $customerId = $d->getId();
                }
                if ($count) 
                {
                    // echo "yay you logged in";
                    Mage::getSingleton('core/session')->set("logged_in_customer_id", $customerId);
                    //print_r($_SESSION);
                    $this->setRedirect('customer/account/dashboard');
                    
                }
                else
                {
                    echo "Wrong Credentials ! ";
                    Mage::getSingleton('core/session')->remove('logged_in_customer_id');
                }    
            }
            catch (Exception $e) 
            {
                var_dump($e->getMessage());
            }
        }
    } 

       
    

public function dashboardAction(){

        $layout = $this->getLayout();
        
        $child = $layout->getChild('content');
        $customerList =  $layout->createBlock('customer/dashboard');
        $child->addChild('customer',$customerList);
        $layout->toHtml();  
    }
}




?>