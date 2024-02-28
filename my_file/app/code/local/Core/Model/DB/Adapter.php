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
        $row = [];
        $sql = mysqli_query($this->connect(),$query);
        while($_row = mysqli_fetch_assoc($sql))
        {
            $row[] =$_row;
        }
        return $row;
    }
    public function insert($query)
    {
        if (mysqli_query($this->connect(), $query)) {
            return mysqli_insert_id($this->connect());
        } else {
            return false;
        }
    }
    public function update($query){
        if (mysqli_query($this->connect(), $query)) {
            return true;
        } else {
            return false;
        }

    }
    public function delete($query)
    {
        if (mysqli_query($this->connect(), $query)) {
            return true;

        } else {
            return false;
        }

    }
    public function fetchRow($query)
    {
        $row = [];
        $sql = mysqli_query($this->connect(), $query);
        while ($_row = mysqli_fetch_assoc($sql)) {
            $row = $_row;
        }
        return $row;

    }
}