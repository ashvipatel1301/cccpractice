<?php 
class Core_Model_Abstract{
    protected $_data = [];
    protected $resourceClass = '';
    protected $collectionClass ='';
    protected $resource = null;
    protected $collection = null;
    protected $_modelClass = null;
    public function __construct(){
        $this->init();  //this will call the Product_Model_Product init method as $this call child's method  
    }
    public function getResource(){
        return new $this->resourceClass;
    }
    
    public function getCollection()
    {
        $collection = new $this->collectionClass();
        $collection->setResource($this->getResource());
        $collection->setModelClass($this->_modelClass);
        $collection->select();
        return $collection;
    }
    public function setId($id){
        $this->_data[$this->getResource()->getPrimaryKey()] = $id;
        return $this;
    }
    public function getId(){
        return isset($this->_data[$this->getResource()->getPrimaryKey()])
        ?$this->_data[$this->getResource()->getPrimaryKey()]
        :false;

    }
    public function __call($name,$args){
        $name= $this->camelTodashed(substr($name,3));
        return isset($this->_data[$name])
        ?$this->_data[$name]
        :"";
    }
    
    public function camelTodashed($className)
    {
        return strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1_', $className));
    }
    public function setData($data){
        $this->_data = $data;
        return $this;
    }
    public function getData(){
        return $this->_data;
    }
    public function save(){
        // echo 233;
        // print_r($this->getData());
        $this->getResource()->save($this);
        // print_r($this);
        return $this;
    }
    protected function _beforeSave(){
        return $this;
    }
    protected function _afterSave(){
        return $this;
    }
    public function load($id,$column=null){
        // echo 123;
        // echo get_class($this->getResource());//Product_Model_Resource_Product  
        $this->_data = $this->getResource()->load($id,$column);
        return $this;
    }
    public function delete(){
        // echo $id;
        $this->getResource()->delete($this);
        return $this;

    }
    public function addData($key, $value)
    {
        $this->_data[$key] = $value;
        return $this;
    }

}