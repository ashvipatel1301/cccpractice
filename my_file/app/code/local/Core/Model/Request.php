<?php

//all work related to uri
class Core_Model_Request{
    protected $_moduleName = "";
    protected $_controllerName = "";
    protected $_actionName = "";
    public function __construct(){
        $uri = $this ->getRequestUri();
        // echo $uri;    //page/index/index?pid=12
        $uri = array_filter(explode("?",$uri));  // if # extra hse to automatic remove kari lese
        // print_r($uri);         //Array ( [0] => page/index/index [1] => pid=12 )
        $uri = $uri[0];
        // echo $uri;            //page/index/index
        $uri = array_filter(explode("/",$uri));
        // print_r($uri);          //Array ( [0] => page [1] => index [2] => index )

        $this->_moduleName    =  isset($uri[0]) ? $uri[0] :'page';
        $this->_controllerName  =  isset($uri[1])  ? $uri[1] : 'index';
        $this->_actionName    =  isset($uri[2])  ? $uri[2] : 'index';
        // echo $this-> _moduleName;
    }
    public function getParams($key = '',$arg=null) {
		return ($key == '')
			? $_REQUEST
			: (isset($_REQUEST[$key])
				? $_REQUEST[$key]
				: ((!is_null($arg )) ? $arg : ''));
			
	}

	public function getPostData($key = '') {
		return ($key == '')
			? $_POST
			: (isset($_POST[$key])
				? $_POST[$key]
				: ''
			);
	}

	public function getQueryData($key = '') {
		return ($key == '')
			? $_GET
			: (isset($_GET[$key])
				? $_GET[$key]
				: ''
			);
	}

	public function isPost()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		    return true;
		}
		return false;
	}
    public function getRequestUri(){
        $request = $_SERVER['REQUEST_URI'];
        // echo $request;
        $request  = str_replace('/String%20Function%20Practice/my_file/','',$request);
        return $request;
    }
    public function getModuleName(){
        return $this->_moduleName;
    } 
   public function getControllerName(){
    return $this->_controllerName;

   }
   public function getUrl($path){
    return 'http://localhost/String Function Practice/my_file/'.$path;
    
}
    public function getActionName(){
        return $this->_actionName;
    }
    public function getFullControllerName(){
      $strClass =  $this->_moduleName . '_Controller_' . $this->_controllerName;
      $strClass = ucwords($strClass,"_");
      return $strClass;
    }
    
}
