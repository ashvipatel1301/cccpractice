<?php
class Core_Controller_Front{
    public function init(){
        $request = Mage::getModel('core/request');  //return the object of Core_Model_Request
        $actionName = $request->getActionName() . 'Action';  //test Action
        $fullClassName  = $request->getFullControllerClass ();
        // echo $fullClassName;
        $fullClassName = new $fullClassName();

        $fullClassName->$actionName();
    } 
}


?>