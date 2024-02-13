<?php
class Mage{
    private static $registry=[];
    private static $baseDir = 'C:\xampp\htdocs\String Function Practice\mvc';

    public static function init(){
       $frontController = new Core_Controller_Front();
       $frontController->init();
        
    }
    public static function getSingleton($className){

    }
    public static function getModel($className){
        $str =explode("/",$className);
        $str1 =ucfirst($str[0]);
        $str2 =ucfirst($str[1]);
        $className = $str1. "_Model_" .$str2;   //class name 
        // echo $className;
        return new $className;        //class's object
    }
    public static function getBlock($className){
        $className = str_replace("/","_Block_",$className);
        $className = ucwords(str_replace("/","_",$className),'_');
        return new $className;
    }
    public static function register($key,$value){

    }
    public static function registry($key){ 

    }
    public static function getBaseDir($subDir = null){
        if($subDir){
             return self::$baseDir. '/' .$subDir;
        }
       return self::$baseDir;
    }
}

?>
