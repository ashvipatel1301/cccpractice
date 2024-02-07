<pre><?php

include_once("connection.php");
include_once("functions.php");

class Data_Collection_Object {
    protected $_data = [];
    public function addData($row){
            $this->_data[] = new Data_Object($row);
    }

    public function getData() {
        return $this->_data;
    }
}
class Data_object{
    protected $_row = [];
    public function __construct($row){
        $this->_row = $row;

    }
    public function __call($name,$args){

        $name =substr($name, 3);
        return isset($this->_row[$name])
            ? $this->_row[$name]
            : $args[0];

            print_r($name);
            echo "<br>";
        }
   
}

    



?>