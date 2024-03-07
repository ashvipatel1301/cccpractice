<?php

class Sales_Model_Quote_Item extends Core_Model_Abstract
{
    protected function _beforeSave(){
        if($this->getProductId()){
          $row_total =  $this->getProduct()->getPrice() * $this->getQty() ;
            $this->addData('row_total',$row_total);
            $this->addData('price',$this->getProduct()->getPrice());
        }
        
    }

    public function getProduct()
    {
        return Mage::getModel('catalog/product')->load($this->getProductId());
    }

    public function init()
    {
        $this->modelClass = "sales/quote_item";
        $this->resourceClass = "Sales_Model_Resource_Quote_Item";
        $this->collectionClass = "Sales_Model_Resource_Collection_Quote_Item";
    }   
    

    public function addItem(Sales_Model_Quote $quote,$productId,$qty){
    
       $item =  $quote->getItemCollection()->addFieldToFilter("product_id",$productId)->getFirstItem();
       $itemId = ( $item && $item->getId())? $item->getId() : 0 ;
       $qty = ($item && $item->getId())? $item->getQty() + $qty : $qty ;
       $data = [
        "item_id" => $itemId,
        "quote_id" => $quote->getId(),
        "product_id" => $productId,
        "qty" => $qty,
        "price" => 0,
        "row_total" => 0
       ];
       Mage::getModel('sales/quote_item')->setData($data)->save();

    }
}