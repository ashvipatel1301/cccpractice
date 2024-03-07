<?php
class Core_Block_Abstract
{
  public $template;

  public function getRequest()
  {
    return Mage::getModel('core/request');

  }
  public function render()
  {
  
    include Mage::getBaseDir('app') . '/design/frontend/tempalate/' . $this->getTemplate();

  }
}