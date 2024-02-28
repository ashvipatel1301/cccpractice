<?php
class Page_Block_Head extends Core_Block_Template{
    protected $_Css=[];
    protected $_Js =[];

    public function __construct(){
        $this->setTemplate('page/head.phtml');
    }
    public function addCss($file){
        $this->_Css[]=$file ;
    }
    public function addJs($file){
        $this->_Js[]=$file;
    }
    public function getCss(){
        return $this->_Css;
    }
    public function getJs(){
        return $this->_Js;
    }
}