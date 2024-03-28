<?php
class Cityuser_Block_City extends Core_Block_Template{
    public function __construct(){
       
        $this->setTemplate('cityuser/city/form.phtml');
    }
    // public function getCityId(){
    //     $cityId = $this->getRequest()->getParams('city');
    //     return $cityId;
    // }
    // public function getuserId(){
    //     $userId = $this->getRequest()->getParams('user');
    //     return $userId;
    // }

}