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
    // public function getItem()
    // {

    //     $quote = Mage::getmodel('sales/quote');
    //     $quote->initQuote();
    //     $id = $quote->getId();
    //     $item = Mage::getmodel('sales/quote_item')->getCollection()->addFieldToFilter('quote_id', $id);
    //     $qty = [];
    //     foreach ($item->getdata() as $_item) {

    //         $qty[$_item->getProductId()] = $_item->getQty();
    //     }
    //     return $qty;
    // }

}