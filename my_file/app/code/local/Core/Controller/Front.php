<?php
class Core_Controller_Front{
    public function init(){
        // echo 234;
        $request = Mage::getModel('core/request');
        // echo $request->getRequestUri();    //page/index/index
        //in page/index/index module-page,controller-index,action-index and in action call go to page phtml phase
        // echo $request->getFullControllerName();    //Page_Controller_Index
        $actionName = $request->getActionName() . 'Action';
        // echo $actionName ;    //indexAction
        $fullClassName = $request->getFullControllerName();
        // echo $fullClassName;   //Page_Controller_Index
        $fullClassName =new $fullClassName();
        $fullClassName->$actionName();  //index Action()
       
    }
}