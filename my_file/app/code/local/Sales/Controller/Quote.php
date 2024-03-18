<?php
class Sales_Controller_Quote extends Core_Controller_Front_Action
{
//addtocart mate che
    public function addAction()
    {
        // echo "add";
        $data = $this->getRequest()->getParams('qdata');
        echo "<pre>";
        print_r($data);

        Mage::getSingleton('sales/quote')->addProduct($data);
        $this->setRedirect('sales/Quote/view');
    }
    public function editAction()
    {
        $formData = $this->getRequest()->getParams('qdata');
        $id = $formData['product_id'];
        $qty = $formData['qty'];
        $quote = Mage::getModel('sales/quote');
        $quote->initQuote();
        $data = $quote->getItemCollection()->addFieldToFilter('product_id', $id)->getFirstItem();
        $data->addData('qty', $qty);
        $data->save();
        $quote->save();
        $this->setRedirect('sales/quote/view');
    }
    public function removeAction()
    {
        $cartDelete = Mage::getModel('sales/quote_item')
            ->load($this->getRequest()->getParams('id', 0))
            ->delete();
        $quote = Mage::getModel('sales/quote');
        $quote->initQuote();
        $quote->save();
        $this->setRedirect('sales/quote/view');

    }
    public function viewAction()
    {

        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $cartView = $layout->createBlock('sales/cartview');
        $child->addChild('cartview', $cartView);
        $layout->toHtml();
    }
    public function checkoutAction()
    {
        $customerId = Mage::getSingleton("core/session")->get("logged_in_customer_id");

        if (!$customerId) {
            $this->setRedirect('customer/account/login');
        } else {
            $layout = $this->getLayout();
            $child = $layout->getChild('content');
            $layout->getChild('head')->addJs(Mage::getBaseUrl() . 'skin/js/jquery-3.7.1.min.js');
            $checkoutView = $layout->createBlock('sales/checkoutview');
            $child->addChild('checkview', $checkoutView);
            $layout->toHtml();
        }

    }
    public function saveAction()
    {

        $addressData = $this->getRequest()->getParams('bdata');
        $shippingData = $this->getRequest()->getParams('smdata');
        $paymentData = $this->getRequest()->getParams('pmdata');
        
        Mage::getSingleton('sales/quote')->addCustomer($addressData);
        Mage::getSingleton('sales/quote')->addShipping($shippingData);
        Mage::getSingleton('sales/quote')->addPayment($paymentData);
        
        $this->setRedirect('sales/quote/convert');
    }
    
    
    public function convertAction(){
    //    print_r(Mage::getModel('sales/quote_paymentmethod')->getData());die;
        Mage::getSingleton('sales/quote')->convert();
        $this->setRedirect('sales/quote/orderplaced');

    }
    public function orderplacedAction(){
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $orderplaced = $layout->createBlock('sales/orderplaced')->setTemplate('sales/orderplaced.phtml');
        
        $child->addChild('orderplaced', $orderplaced);
        $layout->toHtml();

    }

}