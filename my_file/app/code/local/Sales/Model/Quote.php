<?php
class Sales_Model_Quote extends Core_Model_Abstract
{
    public function init()
    {
        $this->_modelClass = "sales/quote";
        $this->resourceClass = "Sales_Model_Resource_Quote";
        $this->cllectionClass = "Sales_Model_Resource_Collection_Quote";
    }
    public function _beforeSave()
    {
        $grandTotal = 0;
        foreach ($this->getItemCollection()->getData() as $_item) {
            $grandTotal += $_item->getRowTotal();
            // var_dump($_item->getRowTotal());
        }
        ;
        $this->addData('grand_total', $grandTotal);
    }
    public function initQuote()
    {
        $quoteId = Mage::getSingleton('core/session')->get('quote_id');
        $quoteId = (!$quoteId) ? 0 : $quoteId;
        $this->load($quoteId);
        if (!$this->getId()) {
            $quote = Mage::getModel('sales/quote')
                ->setData(
                    [
                        'tax_percent' => 0,
                        'grand_total' => 0
                    ]
                )
                ->save();
            Mage::getSingleton('core/session')->set('quote_id', $quote->getId());
            $this->load($quote->getId());
        }

    }
    public function addProduct($product)
    {

        $this->initQuote();
        print_r($this); //$this=Sales_Model_Quote object che 
        if ($this->getId()) {
            Mage::getModel('sales/quote_item')->addItem($this, $product['product_id'], $product['qty']);
            $this->save();
        }

    }
    public function getItemCollection()
    {
        return Mage::getModel('sales/quote_item')->getCollection()
            ->addFieldToFilter('quote_id', $this->getId());
    }
    public function addCustomer($data)
    {

        $this->initQuote();
        $customerAddress=Mage::getModel('sales/quote_customer');
        $quoteCustomer=$customerAddress->getCollection()->addFieldToFilter('quote_id',$this->getId())->getFirstItem();
        $quoteCustomerId=($quoteCustomer && $quoteCustomer->getId()) ? $quoteCustomer->getId() :0;
        //print_r($itemId);
        $customerId=Mage::getSingleton('core/session')->get('logged_in_customer_id');
        $customerModel=Mage::getModel('customer/customer')->load($customerId);
        $customerEmail=$customerModel->getCustomerEmail();
        
        $customerAddress->setData($data)
                         ->addData('quote_customer_id',$quoteCustomerId)            
                          ->addData('quote_id',$this->getId())            
                          ->addData('customer_id',$customerId)            
                           ->addData('email',$customerEmail);
        $customerAddress->save();
        //print_r($customerAddress);               
    }
    public function addShipping($data)
    {
        $this->initQuote();
        $data = Mage::getModel('sales/quote_shippingmethod')->setData($data)->addData('quote_id', $this->getId())->save();

        $this->addData('shipping_id', $data->getId())->save();

    }
    public function addPayment($data)
    {
        $this->initQuote();
        $data = Mage::getModel('sales/quote_paymentmethod')
        ->setData($data)
        ->addData('quote_id', $this->getId())
        ->save();

        $this->addData('payment_id', $data->getId())->save();

    }

    public function convert()
    {

        $this->initQuote();
        if ($this->getId()) {


            $order = Mage::getModel('sales/order')->setData($this->getData())
                ->removeData('quote_id')
                ->removeData('order_id')
                ->removeData('payment_id')
                ->removeData('shipping_id');
                
            // print_r($order);
           
            foreach ($this->getItemCollection()->getData() as $_item) {

                $product = $_item->getProduct();
                Mage::getModel('sales/order_item')->setData($_item->getData())
                    ->addData('order_id', $order->getId())
                    ->removeData('item_id')
                    ->removeData('quote_id')
                    ->addData('product_name', $product->getName())
                    ->addData('product_color', $product->getColor())
                    ->save();


            }
            $shipdata = $this->convertShipping();
            $paydata = $this->convertPayment();

            $order->addData('shipping_id',$shipdata->getId())
                    ->addData('payment_id',$paydata->getId())
                    ->save();
                $this->addData('order_id',$order->getId())->save();  //sales quote orderid
            $this->convertCustomer($order->getId());   // quote to order customer addres 




        }
    }
    public function convertShipping()
    {
        $this->initQuote();
        $data = Mage::getModel('sales/quote_shippingmethod')
            ->getCollection()
            ->addFieldToFilter('quote_id', $this->getId())
            ->getFirstItem();
        // print_r($data);
        $shippingData = Mage::getModel('sales/order_shippingmethod')->setData($data->getData())
            ->removeData('shipping_id')
            ->save();

        return $shippingData;
    }
    public function convertPayment()
    {
        $this->initQuote();
        $data = Mage::getModel('sales/quote_paymentmethod')->getCollection()->addFieldToFilter('quote_id', $this->getId())->getFirstItem();
        // print_r($data);
        $paymentData = Mage::getModel('sales/order_paymentmethod')->setData($data->getData())
            ->removeData('payment_id')
            ->save();
            return $paymentData;

    }
    public function convertCustomer($orderId)
    {
        $this->initQuote();
        $data = Mage::getModel('sales/quote_customer')->getCollection()->addFieldToFilter('quote_id', $this->getId())->getFirstItem();
        $customerData = Mage::getModel('sales/order_customer')->setData($data->getData())
            ->addData('order_id', $orderId)
            ->removeData('quote_customer_id')
            ->removeData('quote_id')
            ->save();
    }
}