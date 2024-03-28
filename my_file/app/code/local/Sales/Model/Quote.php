<?php
class Sales_Model_Quote extends Core_Model_Abstract
{
    public function init()
    {
        $this->_modelClass = "sales/quote";
        $this->resourceClass = "Sales_Model_Resource_Quote";
        $this->collectionClass = "Sales_Model_Resource_Collection_Quote";
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
        $customerAddress = Mage::getModel('sales/quote_customer');
        $quoteCustomer = $customerAddress->getCollection()->addFieldToFilter('quote_id', $this->getId())->getFirstItem();
        $quoteCustomerId = ($quoteCustomer && $quoteCustomer->getId()) ? $quoteCustomer->getId() : 0;
        //print_r($itemId);
        $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id');
        $customerModel = Mage::getModel('customer/customer')->load($customerId);
        $customerEmail = $customerModel->getCustomerEmail();

        $customerAddress->setData($data)
            ->addData('quote_customer_id', $quoteCustomerId)
            ->addData('quote_id', $this->getId())
            ->addData('customer_id', $customerId)
            ->addData('email', $customerEmail);
        $customerAddress->save();
        //print_r($customerAddress);     
        $this->addData('customer_id', $customerId)->save();  //sales quote ma aa cus id jase
    }
    public function addShipping($data)
    {

        $this->initQuote();
        $shippingModel = Mage::getModel('sales/quote_shippingmethod');
        if ($this->getId()) {
            $shippingData = $shippingModel->getCollection()->addFieldToFilter('quote_id', $this->getId())->getFirstItem();
            $shippingId = ($shippingData && $shippingData->getId()) ? $shippingData->getId() : 0;

            $shippingModel
                ->setData($data)
                ->addData('quote_id', $this->getId())
                ->addData('shipping_id', $shippingId)  //aej shipping id par add thse 
                ->save();
            $this->addData('shipping_id',$shippingId)->save();

        }

    }
    public function addPayment($data)
    {
        $this->initQuote();
        $paymentModel = Mage::getModel('sales/quote_paymentmethod');
        if ($this->getId()) {
            $paymentData = $paymentModel->getCollection()->addFieldToFilter('quote_id', $this->getId())->getFirstItem();
            $paymentId = ($paymentData && $paymentData->getId()) ? $paymentData->getId() : 0;

            $paymentModel
                ->setData($data)
                ->addData('quote_id', $this->getId())
                ->addData('payment_id', $paymentId)
                ->save();
                $this->addData('payment_id',$paymentId)->save();

        }
    }

    public function convert()
    {

        $this->initQuote();
        if ($this->getId()) {


            $order = Mage::getModel('sales/order')
                ->setData($this->getData())
                ->removeData('quote_id')
                ->removeData('order_id')
                ->removeData('payment_id')
                ->removeData('shipping_id')
                // ->removeData('customer_id')
                ->save();

            $orderId = $order->getId();
            $shipdata = $this->convertShipping($orderId);
            $paydata = $this->convertPayment($orderId);

            $order->addData('shipping_id', $shipdata->getId())
                ->addData('payment_id', $paydata->getId())
                ->addData('status','pending')
                ->save();

            $this->addData('order_id', $order->getId())->save();   //sales quote orderid
            $this->convertCustomer($orderId);               //quote add to order customer address 
            foreach ($this->getItemCollection()->getData() as $_item) {
                // print_r($_item);die;
                $product = $_item->getProduct();
                Mage::getModel('sales/order_item')->setData($_item->getData())
                    ->addData('order_id', $orderId)
                    ->removeData('item_id')
                    ->removeData('quote_id')
                    ->addData('product_name', $product->getName())
                    ->addData('product_color', $product->getColor())
                    ->save();
            }
        }
    }
    public function convertShipping($orderId)
    {
        $this->initQuote();
        $data = Mage::getModel('sales/quote_shippingmethod')
            ->getCollection()
            ->addFieldToFilter('quote_id', $this->getId())
            ->getFirstItem();
        // print_r($data);
        $shippingData = Mage::getModel('sales/order_shippingmethod')->setData($data->getData())
            ->removeData('shipping_id')
            ->removeData('quote_id')
            ->addData('order_id', $orderId)
            ->save();

        return $shippingData;
    }
    public function convertPayment($orderId)
    {
        $this->initQuote();
        $data = Mage::getModel('sales/quote_paymentmethod')->getCollection()->addFieldToFilter('quote_id', $this->getId())->getFirstItem();
        // print_r($data);
        
        $paymentData = Mage::getModel('sales/order_paymentmethod')->setData($data->getData())
            ->removeData('payment_id')
            ->removeData('quote_id')
            ->addData('order_id', $orderId)
            ->save();
        return $paymentData;

    }
    //quote customer add to order cust add
    public function convertCustomer($orderId)
    {
        $this->initQuote();
        $data = Mage::getModel('sales/quote_customer')->getCollection()->addFieldToFilter('quote_id', $this->getId())->getFirstItem();
        $customerData = Mage::getModel('sales/order_customer')
            ->setData($data->getData())
           
            ->addData('order_id', $orderId)
            ->removeData('quote_customer_id')
            ->removeData('quote_id')
            ->save();
    }
}