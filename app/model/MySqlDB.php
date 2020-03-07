<?php
namespace model;

class MySqlDB{
    private $link;
    public $err;

    public function connect() {
        $this->link = new \mysqli(\Config::$server, \Config::$user, \Config::$password, \Config::$dataBase);
        if(!$this->link) {
            return false;
        }
        $this->runQuery("SET NAMES 'utf-8'");
        return true;
    }
    public function disconnect() {
        $this->link->close();
        unset($this->link);
    }
    public function runQuery($sql) {
        $res = $this->link->query($sql);
        if(!$res) {
            $this->err = $this->link->error;
        }
        return $res;
    }

    public function getArrFromQuery($sql) {
        $res_arr = [];
        $rs = $this->runQuery($sql);
        while($row = $rs->fetch_assoc()) {
            $res_arr[] = $row;
        }
        return $res_arr;
    }

    //get id from last insert
    public function insertId(){
        return $this->link->insert_id;
    }
    //-----------------------------
}