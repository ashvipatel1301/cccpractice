<?php
class Sales_Block_Cartview extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('sales/cartview.phtml');
    }
    public function getCartProducts()
    {
        $quote = $this->getQuoteModel();
        return $quote->getItemCollection();
       


    }
    public function getQuoteModel(){
        $quote = Mage::getModel('sales/quote');
        $quote->initQuote();
        return $quote;

    }
   

}