<?php
class Core_Model_DB_Adapter
{

    public $config = ["host" => "localhost", "user" => "root", "pwd" => "", "db" => "db_project"];
    public $connect = null;
    public function connect()
    {
        if ($this->connect == null) {
            $this->connect = mysqli_connect($this->config["host"], $this->config["user"], $this->config["pwd"], $this->config["db"]);
        }
        return $this->connect;

    }
    public function fetchAll($query)
    {

    }
    public function fetchPairs($query)
    {

    }
    public function fetchOne($query)
    {

    }
    public function fetchRow($query)
    {
        $row = [];
        $sql = mysqli_query($this->connect(), $query);
        while ($_row = mysqli_fetch_assoc($sql)) {
            // print_r($row);
            $row = $_row;
        }
        return $row;
        // return mysqli_fetch_assoc($exec);
    }
    public function insert($query)
    {
        if(mysqli_query($this->connect(), $query)){
            return mysqli_insert_id($this->connect());   //this is inbuilt fun which will insert record in database table 
        }else{
            return false;
        }
    }
    public function update($query)
    {

    }
    public function delete($query)
    {

    }
    public function query($query)
    {

    }

}
?>