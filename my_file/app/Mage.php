<?php

class Mage{
    //C:\xampp\htdocs\String Function Practice\my  file\app\design\frontend\tempalate\core
    private static $baseDir = 'C:\xampp\htdocs\String Function Practice\my_file';
    private static $registry=[];
    private static $_singleton = [];
    public static function init(){
        $frontController = new Core_Controller_Front();
        $frontController->init();
    }
    public static function getModel($className){
        // tyathi core/request avase
        $str = explode("/",$className);
        // print_r($str);   //Array ( [0] => core [1] => request )
        $str1 = ucfirst($str[0]);
        $str2 = ucfirst($str[1]);
        $className = $str1. '_Model_' .$str2;
        // echo $className;  //Core_Model_Request
        return new $className;
    }
    public static function getBlock($className){
        // $str = explode('/',$className);
        // $str1 = ucfirst($str[0]);
        // $str2 = ucfirst($str[1]);
        // $className = $str1. '_Block_' .$str2;
        // return new $className;
        $uriArray = explode("/", $className);
        $className = ucfirst($uriArray[0])."_"."Block"."_".ucfirst($uriArray[1]);
        // echo "From GetBlock".$className."<br>";
        return new $className;
    }
    public static function getBaseDir($subDir = null){
        if($subDir){
             return self::$baseDir. '/' .$subDir;
        }
       return self::$baseDir;
    }
    public static function getBaseUrl(){
        return "http://localhost/String Function Practice/my_file/";
        
    }
    //for banner image url mate
    public static function getMediaUrl($path){
        return "http://localhost/String Function Practice/my_file/media/";

    }
    //when we use getModel() then everytime it will create a object of same class
    //istead of that we use  this so it will create a obj of that class and then we will use everytiome 
    public static function getSingleton($className)
    {
        if(isset(self::$_singleton[$className])) //self is used as sigleton is private variable  and static in this class
        {
            return self::$_singleton[$className];
        }
        else
        {
            self::$_singleton[$className] = self::getModel($className);
            return self::$_singleton[$className];
        }
    }
    public static function register($key,$value){

    }
    public static function registry($key){ 

        
    }

}

