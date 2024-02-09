<?php
class Mage{
    public static function init(){
        // $requestModel = new Core_Model_Request();
        // $uri = $requestModel->getRequestUri();
        // echo $uri;
        // Mage::getModel("core/request"); 
        $requestModel = Mage::getModel("core/request");    
        echo  get_class($requestModel);     //this get_class method return class name of object
        
    }
    public static function getSingleton($className){

    }
    public static function getModel($modelName){
        $str =explode("/",$modelName);
        $str1 =ucfirst($str[0]);
        $str2 =ucfirst($str[1]);
        $output = $str1. "_Model_" .$str2;   //class name 
        // echo $output;
        return new $output;        //class's object
    }
    public static function register($key,$value){

    }
    public static function registry($key){ 

    }
    public static function getBaseDir($subDir = null){

    }
}

?>
