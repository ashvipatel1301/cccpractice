<?php
class Page_Controller_Index extends Core_Controller_Front_Action {
    public function indexAction(){ //responsiblity is render whole html
        // echo 2323;
        $layout = $this->getLayout()->toHtml();     //return object of Core_Block_layout
        // print_r($layout);die;
        // echo dirname(__FILE__);

    }
    public function testAction(){
        echo 13;
    }
    public function saveAction(){
        echo "Save Data";
    }
}


?>