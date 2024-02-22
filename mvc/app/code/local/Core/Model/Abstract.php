<?php
class Core_Model_Abstract
{
    protected $_data = [];
    protected $resourceClass = '';
    protected $collectionClass = '';
    protected $resource = null;
    protected $collection = null;
    public function __construct()
    {
        $this->init();    //this will call Product_Model_Product's init method as $this call child's method
    }
    public function init()
    {

    }
    public function setResourceClass($resourceClass)
    {

    }
    public function setCollectionClass($collectionClass)
    {

    }
    public function setId($id)
    {
        $this->_data[$this->getResource()->getPrimaryKey()] = $id;
        return $this;
    }
    public function getId()
    {
        echo $this->_data[$this->getResource()->getPrimaryKey()];

    }
    public function getResource()
    {
        return new $this->resourceClass();
    }
    public function getCollection()
    {

    }

    public function __set($key, $value)
    {

    }
    public function __get($key)
    {

    }
    public function __unset($key)
    {

    }
    public function __call($name, $args)
    {
        // $name = strtolower(substr($name, 3));
        $name = $this->camelTodashed(substr($name, 3));   //remove get from this
        return isset($this->_data[$name])
            ? $this->_data[$name]
            : "";
    }
    public function camelTodashed($className)
    {
        return strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1_', $className));
    }

    public function getData($key = null)
    {
        return $this->_data;
    }
    public function setData($data)
    {
        $this->_data = $data;
        return $this;  //catalog_model_product 
    }
    public function addData($key, $value)
    {

    }
    public function removeData($key = null)
    {

    }
    public function save()
    {
        echo 33;
        print_r($this->getData());
        $this->getResource()->save($this);
        return $this;

    }
    public function load($id, $column = null)
    {
        // echo get_class($this->getResource()->getTableName();
        // echo $_tableName = $this->getResource()->getTableName();
        $this->_data = $this->getResource()->load($id, $column);
        return $this;
        //   echo "SELECT * FROM {$this->getResource()->getTableName()} WHERE {$this->getResource()->getPrimaryKey()} LIMIT 1";
        
    }
    public function delete()
    {

    }

}
?>