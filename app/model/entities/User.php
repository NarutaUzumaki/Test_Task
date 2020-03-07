<?php
namespace model;

class User{
    private $id;
    private $name;
    private $email;
    private $passwd;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getPasswd(){
        return $this->passwd;
    }

    public function setPasswd($passwd){
        $this->passwd = $passwd;
    }

    public function checkUserPasswd($passwd){
        if ($this->passwd == $passwd){
            return true;
        }else{
            return false;
        }
    }

}