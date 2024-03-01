<?php
class Core_Block_Template extends Core_Block_Abstract{
    public $template;
    public $_child=[];

    public function __construct(){
        $this->setTemplate('1column.phtml');

    }
    
    public function toHtml(){
    //    echo "Ashvi";
        ob_start();
        ob_clean();
        $this->render();//aa function ae 1column ma jay ae rite create karavanu che 
        ob_end_flush();
        

    }
    public function addChild($key,$value){
        $this->_child[$key]=$value;
    }
    public function removeChild($key){

    }
    public function getChild($key){
        return $this->_child[$key];
    }
    public function getChildHtml($key){
        $html ='';
        if($key == '' && count($this->_child)){
            foreach($this->_child as $child){
                $html .= $child->toHtml();
            }
        }else{
            $html = $this->_child[$key]->toHtml();
        }
        return $html;
    }
    public function setTemplate($template){
        $this->template = $template;
        return $this;
        
    }
    public function getTemplate(){
        return $this->template;
    }
    public function getUrl($path){
        return $this->getRequest()->getUrl($path);
  }



}